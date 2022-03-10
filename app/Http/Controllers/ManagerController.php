<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Product;
use App\Models\User;
use App\Models\Client;
use App\Models\Script;
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
use Illuminate\Support\Facades\Storage;
use PDO;
use Illuminate\Validation\ValidationException;

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
                'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'string', 'max:200'],
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
            $name = preg_replace('/[\W]/', '', base64_encode(random_bytes(18)));
            $imageName =  $name . "." . $Image->extension();
            $Image->move(public_path('images'), $imageName);
            // $path = $Image->store('images', 'public');
            // $storage = Storage::disk('s3');
            // $path = "a0002587_main.jpg";
            // $contents = $storage->get('a0002587_main.jpg');
            // dd($contents);
            // Storage::disk('s3')->put('/filename', file_get_contents("C:\Users\Issam Boubcher\Desktop\shutterstock_312911786-1200x675.png"));
            // dd(Storage::disk('s3')->get($path));
            // if (Storage::disk('s3')->exists('a0002587_main.jpg')) {
            //     dd("pooog");
            // } else {
            //     dd("no pog");
            // }
            // dd($storage);
            // dd($path);
            return $imageName;
        } else {
            $imageName = "defaultPFP.webp"; //THIS IS PROFILE PICTURE BY DEFAULT, IF A PFP ISN'T PROVIDED, WE'LL USE THIS ONE
            return $imageName;
        }
    }
    public function listTeamMembers(Request $request)
    {
        $users = User::where('type', '!=', 'manager')->where('teamid', '=', Auth::user()->teamid)->orderBy('name')->get(['id', 'name', 'email', 'company', 'phone', 'country', 'city', 'address', 'zip', 'type', 'image']);
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
        // dd($Teleoperateurs);
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
                'membreName' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'string', 'max:200'],
                'membrePhone' => ['required', 'string', 'max:20'],
                'membreEmail' => ['required', 'string', 'email', 'max:200'],

            ]);
            $user = User::where('id', '=', $request->membreId)->first();
            if ($user) {
                $user->name = ucwords(strtolower($request->membreName));
                $user->phone = $request->membrePhone;
                $checkByEmail = User::where('email', '=', $request->membreEmail)->first();
                // dd($checkByEmail->email);
                if (!$checkByEmail) {
                    $user->email = $request->membreEmail;
                } elseif ($request->membreEmail === $checkByEmail->email && intval($checkByEmail->id) != intval($request->membreId)) {
                    throw ValidationException::withMessages(['membreEmail' => 'Cet email est déjà réservé.']);
                }
                // dd($request);

                // $user->email = $request->membreEmail;
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

    public function storeNewClient(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'clientName' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'string', 'max:22'],
                'clientGender' => ['required'],
                'clientEmail' => ['required', 'string', 'email', 'max:18'],
                'clientCompany' => ['required', 'string', 'max:22'],
                'clientNumber' => ['required', 'string', 'max:22'],
                'clientPosition' => ['required', 'string', 'max:22'],
                'clientCountry' => ['required', 'string', 'max:22'],
                'clientCity' => ['required', 'string', 'max:22'],
                'clientAddress' => ['required', 'string', 'max:22'],
                'clientZip' => ['required', 'string', 'max:22'],
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
    public function listClients(Request $request)
    {
        if (Auth::user()->type === "manager" || Auth::user()->type === "teleoperateur") {
            // $clients = Client::where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'company', 'position', 'phone', 'email', 'gender', 'country', 'city', 'address', 'zip']);
            $clients = Client::where('teamid', '=', Auth::user()->teamid)->orderBy('name')->get(['id', 'name', 'phone', 'company', 'position', 'email', 'city', 'country']);
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
            $clientFind = explode('-', $clientName);
            // dd($clientFind);
            $client = Client::where('id', '=', $clientFind[1])->get(['id', 'gender', 'name', 'email', 'company', 'position', 'phone', 'country', 'city', 'address', 'zip', 'teamid'])->first();
            // dd($client);
            if ($client && intval(Auth::user()->teamid) === intval($client->teamid)) {
                //ADD CLIENT SPECIFIC STATISTICS HERE TO DISPLAY THEM TO THEIR PROFILE
                return view('Views-manager/profileClient', compact('client'));
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
                'clientName' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'string', 'max:17'],
                'clientEmail' => ['required', 'string', 'max:17'],
                'clientCompany' => ['required', 'string', 'max:22'],
                'clientPhone' => ['required', 'string', 'max:22'],
                'clientPosition' => ['required', 'string', 'max:22'],
                'clientCountry' => ['required', 'string', 'max:22'],
                'clientCity' => ['required', 'string', 'max:22'],
                'clientAddress' => ['required', 'string', 'max:22'],
                'clientZip' => ['required', 'string', 'max:22'],
            ]);
            $client = Client::where('id', '=', $request->clientId)->first();
            if ($client) {
                $client->name = ucwords(strtolower($request->clientName));
                $client->phone = $request->clientPhone;
                $client->company = $request->clientCompany;
                $checkByEmail = Client::where('email', '=', $request->clientEmail)->first();
                // dd($checkByEmail->email);
                if (!$checkByEmail) {
                    $client->email = $request->clientEmail;
                } elseif ($request->clientEmail === $checkByEmail->email && intval($checkByEmail->id) != intval($request->clientId)) {
                    throw ValidationException::withMessages(['clientEmail' => 'Cet email est déjà réservé.']);
                }
                // dd($client);
                $client->position = $request->clientPosition;
                $client->country = ucwords(strtolower($request->clientCountry));
                $client->city = ucwords(strtolower($request->clientCity));
                $client->address = ucwords($request->clientAddress);
                $client->zip = $request->clientZip;
                // dd($request);
                $client->update();
                return redirect("/clients/" . str_replace(' ', '', $client->name) . "-" . $client->id);
            } else return redirect('404');
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

    public function storeNewProduct(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'prodName' => ['required', 'string', 'max:200'],
                'prodPrice' => ['required', 'numeric'],
                'prodQuantity' => ['required', 'integer'],
            ]);
            $product = new Product;
            $product->name = ucwords($request->prodName);
            $product->price = $request->prodPrice;
            $product->quantity = $request->prodQuantity;
            $product->teamid =  Auth::user()->teamid;
            $product->save();
            return redirect('/produits');
        } else return redirect('404');
    }
    public function listProducts(Request $request)
    {
        if (Auth::user()->type === "manager") {

            // $products = Product::where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'price', 'quantity']); UNCOMMENT THIS AND CHANGE THE NEXT 2 LINES
            // $products = Product::where('teamid', '=', 0)->get(['id', 'name', 'price', 'quantity']);
            $products = Product::where('teamid', '=', Auth::user()->teamid)->orderBy('name')->get(['id', 'name', 'price', 'quantity']);
            $prodCount = count($products);
            // dd($vars);
            return view('Views-manager/manager-produits', compact('products', 'prodCount'));
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

    public function storeNewScript(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'scriptName' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'string', 'max:21'],
                'content' => ['required', 'max:16000'],
            ]);
            $script = new Script;
            $scriptContent = str_replace('&', '&amp;', $request->content);
            $checkByName = Script::where('name', '=', ucwords(strtolower($request->scriptName)))->first();

            if (!$checkByName) {
                $script->name = ucwords(strtolower($request->scriptName));
            } else {
                throw ValidationException::withMessages(['scriptName' => 'Ce nom est déjà réservé.']);
            }
            // dd($script);
            //$script->name = ucwords(strtolower($request->scriptName));

            $script->content = $scriptContent;
            $script->teamid = Auth::user()->teamid;
            // dd($script);
            $script->save();
            return redirect('/scripts');
        } else return redirect('404');
    }

    public function listScripts(Request $request)
    {
        if (Auth::user()->type === "manager") {
            $scripts = Script::where('teamid', '=', Auth::user()->teamid)->orderBy('name')->get(['id', 'name', 'content', 'teamid']);
            // $scripts = $scripts;
            $scriptCount = count($scripts);
            return view('Views-manager/manager-scripts', compact('scriptCount', 'scripts'));
        } else return redirect('404');
    }

    public function profileScript(Request $request)
    {
        if (Auth::user()->type === "manager" || Auth::user()->type === "teleoperateur") {
            $scriptName = ucwords(strtolower(trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $request->slug))));
            $scriptFind = explode('-', $scriptName);
            // dd($scriptName);
            $script = Script::where('id', '=', $scriptFind[1])->get(['id', 'name', 'content', 'teamid'])->first();
            // dd($script);
            if ($script && intval(Auth::user()->teamid) === intval($script->teamid)) {
                //ADD SCRIPT SPECIFIC STATISTICS HERE TO DISPLAY THEM TO THEIR PROFILE
                return view('Views-manager/profileScript', compact('script'));
            } else return redirect('404');
        } else return redirect('404');
        // dd($client);
    }

    public function changeScript(Request $request)
    {
        // dd($request);
        if (Auth::user()->type === 'manager') {
            $script = Script::where('id', '=', $request->scriptId)->get(['id', 'name', 'content', 'teamid'])->first();
            // dd($script);
            if ($script) {
                return view('Views-manager/modify-script', compact('script'));
            } else return redirect('404');
        } else return redirect('404');
    }
    public function modifyScript(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $attributes = $request->validate([
                'scriptName' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'string', 'max:21'],
                'content' => ['required', 'max:16000'],
            ]);
            // dd($request);

            // $scriptContent = str_replace('&', '&amp;', $request->content);
            $checkByName = Script::where('name', '=', ucwords(strtolower($request->scriptName)))->first();
            $script = Script::where('id', '=', ucwords(strtolower($request->scriptId)))->first();
            if (!$checkByName) {
                $script->name = ucwords(strtolower($request->scriptName));
            } elseif ($request->scriptName === $checkByName->name && intval($checkByName->id) != intval($request->scriptId)) {
                // dd("yo wtf");
                throw ValidationException::withMessages(['scriptName' => 'Ce nom est déjà réservé.']);
                // return redirect($this->redirectTo = url()->previous());
            }
            // dd($script);
            // $script->content = $scriptContent;
            $script->content = $request->content;
            // dd($script);
            $script->update();
            return redirect('/scripts/' . str_replace(' ', '', ucwords(strtolower($script->name))) . "-" . $script->id);
        } else return redirect('404');
    }

    public function deleteScript(Request $request)
    {
        $script = Script::where('id', '=', $request->deleteId)->first();
        if (Auth::user()->type === 'manager' && intval(Auth::user()->teamid) == intval($script->teamid)) {
            $script->delete();
            //TODO: DELETE THIS SCRIPT'S DATA ELSEWHERE
            return redirect('/scripts');
        } else return redirect('404');
    }

    public function listCalls(Request $request)
    {
        if (Auth::user()->type === "manager") {
            $calls = Call::where('teamid', '=', Auth::user()->teamid)->orderBy('callId')->get([
                'id', 'callId', 'teleoperateur', 'client', 'quantity', 'product', 'result', 'callDate', 'callLength', 'teleoperateurId', 'productId', 'clientId', 'teamid'
            ]);
            $callCount = count($calls);
            return view('Views-manager/manager-historique', compact('callCount', 'calls'));
        } elseif (Auth::user()->type === "teleoperateur") {
            $calls = Call::where('teamid', '=', Auth::user()->teamid)->where('teleoperateurId', '=', Auth::user()->id)->orderBy('callId')->get([
                'id', 'callId', 'teleoperateur', 'client', 'quantity', 'product', 'result', 'callDate', 'callLength', 'teleoperateurId', 'productId', 'clientId', 'teamid'
            ]);
            $callCount = count($calls);
            return view('Views-manager/manager-historique', compact('callCount', 'calls'));
        }
        return redirect('404');
    }
}
