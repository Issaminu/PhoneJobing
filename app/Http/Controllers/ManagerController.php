<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use PDO;

class ManagerController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeNewMember(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'phone' => ['required', 'string', 'max:20'],
                'memberImage' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ]);
            $newMember = User::create([
                'name' => ucwords(strtolower($request->name)),
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => Auth::user()->company,
                'country' => ucwords(strtolower($request->country)),
                'city' => ucwords(strtolower($request->city)),
                'address' => ucwords($request->address),
                'zip' => $request->zip,
                'image' => $this->imageUpload($request->memberImage),
                'password' => Hash::make($request->password),
                'type' => $request->accountTypeChoice,
                'teamid' => Auth::user()->teamid, //THIS IS TO GET "TEAMID" OF THE NEW MEMBRE OF THE TEAM TO BE EQUIVALENT WITH THE "TEAMID" OF THE MANAGER
            ]);
            event(new Registered($newMember));
            return redirect('/equipe');
        } else return redirect('404');
    }
    public function imageUpload($Image)
    {
        if ($Image) {
            // $newId = Client::orderBy('id', 'desc')->take(1)->first()->id + 1;
            $name = base64_encode(random_bytes(18));
            $imageName = preg_replace('/[\W]/', '', $name) . "." . $Image->extension();
            // dd($imageName);
            // $request->clientImage->move(public_path('images'), $imageName);
            $Image->move(public_path('images'), $imageName);
            /* Store $imageName name in DATABASE from HERE */
            return $imageName;
        } else {
            $imageName = "defaultPFP.webp"; //THIS IS PROFILE PICTURE BY DEFAULT, IF A PFP ISN'T PROVIDED, WE'LL USE THIS ONE
            return $imageName;
        }
    }
    public function listTeamMembers(Request $request)
    {
        $users = User::where('type', '!=', 'manager')->where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'email', 'company', 'phone', 'country', 'city', 'address', 'zip', 'type', 'image']);
        // dd($users);
        $TeleCount = 0;
        $CommCount = 0;
        $Teleoperateurs = array();
        $Commerciaux = array();
        foreach ($users as $i) {
            if ($i->type == "teleoperateur") {
                $TeleCount++;
                array_push($Teleoperateurs, $i);
            } elseif ($i->type == "commercial") {
                $CommCount++;
                array_push($Commerciaux, $i);
            }
        }
        return view('Views-manager/manager-equipe', compact('Teleoperateurs', 'Commerciaux', 'TeleCount', 'CommCount'));
    }
    public function profileMember(Request $request)
    {
        $userName = ucwords(strtolower(trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $request->slug))));
        $user = User::where('name', '=', $userName)->first();
        // dd($user);
        if (intval(Auth::user()->teamid) === intval($user->teamid)) {
            $user = User::where('name', '=', $userName)->get(['id', 'name', 'email', 'company', 'phone', 'country', 'city', 'address', 'zip', 'type', 'image', 'teamid'])->first();
            //ADD USER SPECIFIC STATISTICS HERE TO DISPLAY THEM TO THEIR PROFILE
            // dd($user);
            if ($user) {
                return view('Views-manager/profileUser', compact('user'));
            } else return redirect('404');
            // return redirect('/equipe');
        } else return redirect('404');
    }
    public function modifyMember(Request $request)
    {
        // dd($request->membreImage);
        if (Auth::user()->type === 'manager' || intval(Auth::user()->id) === intval($request->membreId)) {
            $attributes = $request->validate([
                'membreName' => ['required', 'string', 'max:200'],
                'membrePhone' => ['required', 'string', 'max:20'],
            ]);
            $user = User::where('id', '=', $request->membreId)->first();
            if ($user) {
                $user->name = ucwords(strtolower($request->membreName));
                $user->phone = $request->membrePhone;
                $user->country = ucwords(strtolower($request->membreCountry));
                // dd($request);
                if (Auth::user()->type === 'manager' && $request->membreId === Auth::user()->teamid) {
                    $user->company = $request->membreCompany;
                    User::where(['teamid' => Auth::user()->teamid])->update(['company' => $request->membreCompany]); //THIS WILL UPDATE THE COMPANY NAME OF ALL TEAM MEMBERS TO THE MANAGER'S NEW COMPANY NAME
                    // dd($user);
                }
                if ($request->membreImage) {
                    $user->image = $this->imageUpload($request->membreImage);
                }
                $user->city = ucwords(strtolower($request->membreCity));
                $user->address = ucwords($request->membreAddress);
                $user->zip = $request->membreZip;
                $user->update();
                return redirect("/equipe/" . str_replace(' ', '', $user->name));
            } else return redirect('404');
        } else return redirect('404');
    }
    public function deleteMember(Request $request)
    {
        $user = User::where('email', '=', $request->deleteEmail)->first();
        if (Auth::user()->type === 'manager' && $user->teamid === Auth::user()->teamid) {
            // $user = User::find(User::where('email', $request->deleteEmail)->first());
            // $user->delete();        
            $user->delete();
            //TODO: DELETE THIS USER'S DATA FROM STATISTICS
            return redirect('/equipe');
        } else return redirect('404');
    }
    public function listProducts(Request $request)
    {
        if (Auth::user()->type === "manager") {

            // $products = Product::where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'price', 'quantity']); UNCOMMENT THIS AND CHANGE THE NEXT 2 LINES
            // $products = Product::where('teamid', '=', 0)->get(['id', 'name', 'price', 'quantity']);
            $products = Product::where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'price', 'quantity']);
            $prodCount = count($products);
            // dd($vars);
            return view('Views-manager/manager-produits', compact('products', 'prodCount'));
        } else return redirect('404');
    }
    public function storeNewProduct(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'prodName' => ['required', 'string', 'max:200'],
                'prodPrice' => ['required', 'numeric'],
                'prodQuantity' => ['required', 'integer'],
            ]);
            $product = new Product;
            $product->name = ucwords(strtolower($request->prodName));
            $product->price = $request->prodPrice;
            $product->quantity = $request->prodQuantity;
            $product->teamid =  Auth::user()->teamid;
            $product->save();
            return redirect('/produits');
        } else return redirect('404');
    }
    public function modifyProduct(Request $request)
    {
        // $test =  intval(Product::where('id', '=', $request->prodId)->first()->value('teamid'));
        // dd($request);
        // dd(intval(Auth::user()->id));

        if (Auth::user()->type === 'manager' && intval(Product::where('id', '=', $request->prodId)->first()->value('teamid')) == intval(Auth::user()->id)) {
            $attributes = $request->validate([
                'prodName' => ['required', 'string', 'max:200'],
                'prodPrice' => ['required', 'numeric'],
                'prodQuantity' => ['required', 'integer'],
            ]);
            $product = Product::where('id', '=', $request->prodId)->first();
            $product->name = $request->prodName;
            $product->price = $request->prodPrice;
            $product->quantity = $request->prodQuantity;
            $product->update();
            return redirect('/produits');
        } else return redirect('404');
    }
    public function deleteProduct(Request $request)
    {
        $product = Product::where('id', '=', $request->deleteProdId)->first();
        // if (Auth::user()->type === 'manager' && intval(Auth::user()->teamid) == intval($product->teamid)) {
        if (Auth::user()->type === 'manager') {
            $product->delete();
            //TODO: DELETE THIS PRODUCT'S DATA ELSEWHERE
            return redirect('/produits');
        } else return redirect('404');
    }

    public function listClients(Request $request)
    {
        if (Auth::user()->type === "manager" || Auth::user()->type === "teleoperateur") {
            // $clients = Client::where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'company', 'position', 'phone', 'email', 'gender', 'country', 'city', 'address', 'zip']);
            $clients = Client::where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'phone', 'company', 'position', 'email', 'city', 'country']);
            $clientCount = count($clients);
            // dd($clientCount);
            // dd($vars);
            return view('Views-manager/manager-clients', compact('clientCount', 'clients'));
        } else return redirect('404');
    }

    public function profileClient(Request $request)
    {
        if (Auth::user()->type === "manager" || Auth::user()->type === "teleoperateur") {
            $clientName = ucwords(strtolower(trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $request->slug))));
            $client = Client::where('name', '=', $clientName)->get(['id', 'gender', 'name', 'email', 'company', 'position', 'phone', 'country', 'city', 'address', 'zip', 'teamid'])->first();
            if ($client) {
                if (intval(Auth::user()->teamid) === intval($client->teamid)) {
                    //ADD CLIENT SPECIFIC STATISTICS HERE TO DISPLAY THEM TO THEIR PROFILE
                    return view('Views-manager/profileClient', compact('client'));
                } else return redirect('404');
            } else return redirect('404');
        } else return redirect('404');
        // dd($client);
    }
    public function modifyClient(Request $request)
    {
        // dd($request);
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'clientId' => ['required', 'string', 'max:200'],
                'clientName' => ['required', 'string', 'max:200'],
                'clientCompany' => ['required', 'string', 'max:200'],
                'clientPhone' => ['required', 'string', 'max:200'],
                'clientPosition' => ['required', 'string', 'max:200'],
                'clientCountry' => ['required', 'string', 'max:200'],
                'clientCity' => ['required', 'string', 'max:200'],
                'clientAddress' => ['required', 'string', 'max:200'],
                'clientZip' => ['required', 'string', 'max:200'],
            ]);
            $client = Client::where('id', '=', $request->clientId)->first();
            if ($client) {
                $client->name = ucwords(strtolower($request->clientName));
                $client->phone = $request->clientPhone;
                $client->company = $request->clientCompany;
                $client->position = $request->clientPosition;
                $client->country = ucwords(strtolower($request->clientCountry));
                $client->city = ucwords(strtolower($request->clientCity));
                $client->address = ucwords($request->clientAddress);
                $client->zip = $request->clientZip;
                // dd($request);
                $client->update();
                return redirect("/clients/" . str_replace(' ', '', $client->name));
            } else return redirect('404');
        } else return redirect('404');
    }

    public function storeNewClient(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'clientName' => ['required', 'string', 'max:200'],
                'clientGender' => ['required'],
                'clientEmail' => ['required', 'string', 'email', 'max:200'],
                'clientCompany' => ['required', 'string', 'max:200'],
                'clientNumber' => ['required', 'string', 'max:200'],
                'clientPosition' => ['required', 'string', 'max:200'],
                'clientCountry' => ['required', 'string', 'max:200'],
                'clientCity' => ['required', 'string', 'max:200'],
                'clientAddress' => ['required', 'string', 'max:200'],
                'clientZip' => ['required', 'string', 'max:200'],
            ]);
            $client = new Client;
            $client->name = ucwords(strtolower($request->clientName));
            $client->gender = $request->clientGender;
            $client->email = $request->clientEmail;
            $client->phone = $request->clientNumber;
            $client->company = ucwords($request->clientCompany);
            $client->position = ucwords($request->clientPosition);
            $client->country = ucwords(strtolower($request->clientCountry));
            $client->city = ucwords(strtolower($request->clientCity));
            $client->address = ucwords($request->clientAddress);
            $client->zip = $request->clientZip;
            $client->teamid =  Auth::user()->teamid;
            $client->save();
            return redirect('/clients');
        } else return redirect('404');
    }

    public function deleteClient(Request $request)
    {
        $client = Client::where('email', '=', $request->deleteEmail)->first();
        if (Auth::user()->type === 'manager' && intval(Auth::user()->teamid) == intval($client->teamid)) {
            $client->delete();
            //TODO: DELETE THIS CLIENT'S DATA ELSEWHERE
            return redirect('/clients');
        } else return redirect('404');
    }
}
