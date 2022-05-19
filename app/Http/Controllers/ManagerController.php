<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Product;
use App\Models\User;
use App\Models\Client;
use App\Models\LastWeek;
use App\Models\Sale;
use App\Models\Script;
use App\Models\ThisWeek;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Filesystem\AwsS3V3Adapter;
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
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\File;


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


    public function addMember(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $clients = Client::where('teamid', '=', Auth::user()->teamid)->where('teleoperateur', '=', null)->orderBy('name')->get(['id AS value', 'name', 'email']);
            $clients = json_encode($clients);
            // dd($clients);
            return view('Views-manager/manager-add-member', compact('clients'));
        } else return redirect('404');
    }

    public function storeNewMember(Request $request)
    {
        // dd($request);
        if (Auth::user()->type === 'manager') {
            // dd(json_decode($request->clients));

            // dd($request->clients[0]['value']);
            // dd($request);
            $attributes = $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'string', 'max:200'],
                'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'phone' => ['required', 'string', 'max:20'],
                'memberImage' => 'image|mimes:jpeg,png,jpg,svg,webp',
            ]);
            $clients = [];
            $i = 0;
            foreach (json_decode($request->clients) as $client) {
                $clients[$i] = $client->value;
                $i++;
            }
            $clients = json_encode($clients);

            $newMember = User::create([
                'name' => ucwords(strtolower($request->name)),
                'email' => $request->email,
                'phone' => $request->phone,
                'clients' => $clients,
                'company' => Auth::user()->company,
                'country' => ucwords(strtolower($request->country)),
                'city' => ucwords(strtolower($request->city)),
                'address' => ucwords($request->address),
                'zip' => $request->zip,
                'image' => $this->imageUpload($request->memberImage, 0),  //JUST IGNORE THE 0, IT PROBABLY WON'T HARM ANYONE, RIGHT?
                'password' => Hash::make($request->password),
                'type' => 'teleoperateur',
                'teamid' => Auth::user()->teamid, //THIS IS TO GET "TEAMID" OF THE NEW MEMBRE OF THE TEAM TO BE EQUIVALENT WITH THE "TEAMID" OF THE MANAGER
            ]);
            // event(new Registered($newMember));
            foreach (json_decode($request->clients) as $client) {
                $thisClient = Client::where('id', '=', $client->value)->first();
                if (!$thisClient || $thisClient->teleoperateur != null) {
                    return redirect('404');
                }
                $thisClient->teleoperateur = $newMember->id;
                $thisClient->update();
            }
            $Sale = new Sale;
            $Sale->TeleoperateurId = $newMember->id;
            $Sale->callCount = 0;
            $Sale->earnings = 0;
            $Sale->saleCount = 0;
            $Sale->productCount = 0;
            $Sale->teamid = $newMember->teamid;
            // dd($Sale);
            $Sale->save();

            return redirect('/equipe');
        } else return redirect('404');
    }
    public function imageUpload($Image, $id)
    {
        if ($Image) {
            $name = preg_replace('/[\W]/', '', base64_encode(random_bytes(18)));
            $imageName =  $name . "." . $Image->extension();
            $Image->move(public_path('images'), $imageName);
            $nameInS3 = 'images/' . $imageName . '/';
            $storeS3 = Storage::disk('s3')->put($nameInS3, file_get_contents('images/' . $imageName));
            if (strval(auth()->user()->id) === strval($id)) {
                auth()->user()->image = $imageName;
            }
            return $imageName;
        } else {
            $imageName = "defaultPFP.webp"; //THIS IS PROFILE PICTURE BY DEFAULT, IF A PFP ISN'T PROVIDED, WE'LL USE THIS ONE
            return $imageName;
        }
    }
    public function listTeamMembers(Request $request)
    {
        $users = User::where('type', '!=', 'manager')->where('teamid', '=', Auth::user()->teamid)->orderBy('name')->get(['id', 'name', 'email', 'company', 'phone', 'country', 'city', 'address', 'zip', 'type', 'image']);
        $manager = User::where('type', '=', 'manager')->where('teamid', '=', Auth::user()->teamid)->get(['id', 'name', 'email', 'company', 'phone', 'country', 'city', 'address', 'zip', 'type', 'image'])->first();
        // dd($manager->image);
        if (file_exists(public_path(('images/' . $manager->image)))) {
            $manager->image = asset('images/' . $manager->image);
            // dd($manager->image);
        } else {
            $manager->image =  Storage::disk('s3')->temporaryUrl(
                'images/' . $manager->image,
                Carbon::now()->addMinutes(20)
            );
        }
        // dd($users);
        $TeleCount = 0;
        $CommCount = 0;
        $Teleoperateurs = array();
        $Commerciaux = array();
        foreach ($users as $i) {
            if ($i->type == "teleoperateur") {
                $TeleCount++;
                if (!$i->image) {
                    $i->image = "defaultPFP.webp";
                    $i->update();
                }
                if (file_exists(public_path(('images/' . $i->image)))) {
                    $i->image = asset('images/' . $i->image);
                } else {
                    $i->image =  Storage::disk('s3')->temporaryUrl(
                        'images/' . $i->image,
                        Carbon::now()->addMinutes(20)
                    );
                }
                array_push($Teleoperateurs, $i);
            } elseif ($i->type == "commercial") {
                $CommCount++;
                if (!$i->image) {
                    $i->image = "defaultPFP.webp";
                    $i->update();
                }
                if (file_exists(public_path(('images/' . $i->image)))) {
                    $i->image = asset('images/' . $i->image);
                } else {
                    $i->image =  Storage::disk('s3')->temporaryUrl(
                        'images/' . $i->image,
                        Carbon::now()->addMinutes(20)
                    );
                }
                array_push($Commerciaux, $i);
            }
        }
        // dd($Teleoperateurs);
        return view('Views-manager/manager-equipe', compact('manager', 'Teleoperateurs', 'Commerciaux', 'TeleCount', 'CommCount'));
    }
    public function profileMember(Request $request)
    {
        $userName = ucwords(strtolower(trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $request->slug))));
        $user = User::where('name', '=', $userName)->first();
        // dd($user);
        if (intval(Auth::user()->teamid) === intval($user->teamid)) {
            $user = User::where('name', '=', $userName)->get(['id', 'name', 'email', 'company', 'phone', 'clients', 'country', 'city', 'address', 'zip', 'type', 'image', 'teamid'])->first();
            //ADD USER SPECIFIC STATISTICS HERE TO DISPLAY THEM TO THEIR PROFILE
            // dd($user);
            // $user->image = Storage::disk('s3')->get('images/' . $user->image);
            $clients = json_encode(Client::where('teamid', '=', Auth::user()->teamid)->where(function ($q) use ($user) {
                $q->where('teleoperateur', null)
                    ->orWhere('teleoperateur', $user->id);
            })->orderBy('name')->get(['id AS value', 'name', 'email']));
            // $unreservedClients = json_encode(Client::where('teamid', '=', Auth::user()->teamid)->where('teleoperateur', '=', null)->orderBy('name')->get(['id AS value', 'name', 'email']));
            // dd(json_decode($clients));
            $i = 0;
            $reservedClients = [];
            if ($user->clients) {
                foreach (json_decode($clients) as $client) {
                    foreach (json_decode($user->clients) as $reservedClient) {
                        if ($client->value === intval($reservedClient)) {
                            $reservedClients[$i] = $client->name;
                            $i++;
                        }
                    }
                }
            }
            $reservedClients = json_encode($reservedClients);
            // dd($reservedClients);

            if (file_exists(public_path(('images/' . $user->image)))) {
                $user->image = asset('images/' . $user->image);
            } else {
                $user->image =  Storage::disk('s3')->temporaryUrl(
                    'images/' . $user->image,
                    Carbon::now()->addMinutes(20)
                );
            }
            // dd($user->image);
            if ($user) {
                return view('Views-manager/profileUser', compact('user', 'clients', 'reservedClients'));
            } else return redirect('404');
            // return redirect('/equipe');
        } else return redirect('404');
    }
    public function modifyMember(Request $request)
    {
        // dd($request->memberImage);
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
                $clients = [];
                $i = 0;
                if (Auth::user()->type === "manager" && $user->type != "manager") {
                    foreach (json_decode($request->clients) as $client) {
                        $clients[$i] = $client->value;
                        $i++;
                        $thisClient = Client::where('id', '=', $client->value)->first();
                        if (!$thisClient || ($thisClient->teleoperateur != null && $thisClient->teleoperateur != $user->id)) {
                            return redirect('404');
                        }
                        $thisClient->teleoperateur = $user->id;
                        $thisClient->update();
                    }
                    $clients = json_encode($clients);
                    $user->clients = $clients; //THIS IS TO SAVE THE RESERVED CLIENTS ONTO THE TELEOP'S ROW IN THE USERS TABLE

                    if ($request->oldClients) {
                        $unreservedClients = array_diff(json_decode($request->oldClients), json_decode($clients)); //THIS IS TO REMOVE THE TELEOP ID FROM THE CLIENT WHICH IS NO LONGER RESERVED FOR THIS TELEOP
                        foreach ($unreservedClients as $unreservedClient) {
                            $deletedClient = Client::where('id', '=', $unreservedClient)->first();
                            $deletedClient->teleoperateur = null;
                            $deletedClient->update();
                        }
                    }
                }
                // $user->email = $request->membreEmail;
                $user->country = ucwords(strtolower($request->membreCountry));
                // dd($request);
                if (Auth::user()->type === 'manager' && $request->membreId === Auth::user()->teamid) {
                    $user->company = $request->membreCompany;
                    User::where(['teamid' => Auth::user()->teamid])->update(['company' => $request->membreCompany]); //THIS WILL UPDATE THE COMPANY NAME OF ALL TEAM MEMBERS TO THE MANAGER'S NEW COMPANY NAME
                    // dd($user);
                }
                if ($request->membreImage) {
                    // dd($request->membreImage);
                    if ($user->image != 'defaultPFP.webp') {
                        if (file_exists(public_path(('images/' . $user->image)))) {
                            File::delete(public_path('images/' . $user->image));
                        }
                        if (Storage::disk('s3')->exists('images/' . $user->image)) {
                            Storage::disk('s3')->delete('images/' . $user->image);
                        }
                        $user->image = $this->imageUpload($request->membreImage, $user->id);
                    }
                }
                // dd('bruh');
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
        // dd("yo");
        $user = User::where('email', '=', $request->deleteEmail)->first();
        if (Auth::user()->type === 'manager' && $user->type != "manager" && $user->teamid === Auth::user()->teamid) {
            // dd("yooo");

            // $user = User::find(User::where('email', $request->deleteEmail)->first());
            // $user->delete();
            if ($user->image != 'defaultPFP.webp') {
                if (file_exists(public_path(('images/' . $user->image)))) {
                    File::delete(public_path('images/' . $user->image));
                }
                if (Storage::disk('s3')->exists('images/' . $user->image)) {
                    Storage::disk('s3')->delete('images/' . $user->image);
                }
            }
            //TODO: DELETE THIS USER'S DATA FROM STATISTICS [DONE]
            $sale = Sale::where('teleoperateurId', '=', $user->id)->first();
            if ($sale) {
                $sale->delete();
            }
            //TODO: DELETE THIS USER'S DATA FROM CALLS [DONE]
            $call = Call::where('teleoperateurId', '=', $user->id)->first();
            if ($call) {
                $call->delete();
            }
            //TODO: UNRESERVE THE CLIENTS RESERVED TO THIS TELEOPERATEUR [DONE]
            $clients = json_decode($user->clients);
            if ($clients) {
                foreach ($clients as $clientId) {
                    $reservedClient = Client::where('id', '=', $clientId)->first();
                    $reservedClient->teleoperateur = null;
                }
            }

            $user->delete();
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
            $clients = Client::where('teamid', '=', Auth::user()->teamid)->orderBy('name')->get(['id', 'name', 'phone', 'email', 'city', 'country']);
            $clientCount = count($clients);
            foreach ($clients as $client) {
                $hisCalls = Call::where('clientId', '=', $client->id)->where('quantity', '>', 0)->get(['quantity', 'productId']);
                if ($hisCalls) {
                    foreach ($hisCalls as $call) {
                        $product = Product::where('id', '=', $call->productId)->first();
                        $productPrice = $product->price;
                        $client->quantity = $call->quantity;
                        $client->earnings += $productPrice * $call->quantity;
                    }
                }
            }
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
            $hisCalls = Call::where('clientId', '=', $client->id)->where('quantity', '>', 0)->get(['quantity', 'productId']);
            $client->quantity = count($hisCalls);

            if ($hisCalls) {

                foreach ($hisCalls as $call) {
                    $product = Product::where('id', '=', $call->productId)->first();
                    $productPrice = $product->price;
                    $client->earnings += $productPrice * $call->quantity;
                }
            }
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
            foreach ($products as $product) {
                $hisCalls = Call::where('teamid', '=', Auth::user()->teamid)->where('productId', '=', $product->id)->get(['quantity', 'productId']);
                $product->quantitySold = count($hisCalls);
            }
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
                // throw (ValidationException::withMessages(['Ce nom est déjà réservé.']));
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
            $calls = Call::where('teamid', '=', Auth::user()->teamid)->orderBy('callId', 'DESC')->get([
                'id', 'callId', 'quantity', 'result', 'callDate', 'callLength', 'teleoperateurId', 'productId', 'clientId', 'teamid'
            ]);
            foreach ($calls as $call) {
                $call->teleoperateur = User::where('id', '=', $call->teleoperateurId)->first()->name; //CHANGE "->id" TO "->name"
                $call->client = Client::where('id', '=', $call->clientId)->first()->name;
                if (Product::where('id', '=', $call->productId)->first() != null) {
                    $call->product = Product::where('id', '=', $call->productId)->first()->name;   //CHANGE "->price" TO "->name"
                } else {
                    $call->product = "̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶";
                }
            }
            $callCount = count($calls);
            return view('Views-manager/manager-historique', compact('callCount', 'calls'));
        } elseif (Auth::user()->type === "teleoperateur") {
            $calls = Call::where('teamid', '=', Auth::user()->teamid)->where('teleoperateurId', '=', Auth::user()->id)->orderBy('callId', 'DESC')->get([
                'id', 'callId', 'quantity', 'result', 'callDate', 'callLength', 'teleoperateurId', 'productId', 'clientId', 'teamid'
            ]);
            foreach ($calls as $call) {
                $call->teleoperateur = User::where('id', '=', $call->teleoperateurId)->first()->name;
                $call->client = Client::where('id', '=', $call->clientId)->first()->name;
                if (Product::where('id', '=', $call->productId)->first() != null) {
                    $call->product = Product::where('id', '=', $call->productId)->first()->name;
                } else {
                    $call->product = "̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶";
                }
            }
            $callCount = count($calls);
            return view('Views-manager/manager-historique', compact('callCount', 'calls'));
        } else return redirect('404');
    }
    public function dashboard(Request $request)
    {
        if (Auth::user()->type === "manager") {
            // $date = Carbon::now()->subDays(7)->format('Y-m-d');
            // dd(Carbon::parse('3/13/2022')->weekOfMonth);
            $salesLastWeek = Call::where('teamid', '=', Auth::user()->teamid)->whereBetween(
                'callDate',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->get();
            if ($salesLastWeek) {
                // $salesLastWeek = Call::where('teamid', '=', Auth::user()->teamid)->whereBetween(    USE THIS AND DELETE THE BOTTOM ONE
                //     'callDate',
                //     [Carbon::now()->subDays(7)->startOfWeek(), Carbon::now()->endOfWeek()]
                // )->get();
                $salesLastWeek = Call::where('teamid', '=', Auth::user()->teamid)->whereBetween(
                    'callDate',
                    [Carbon::parse('3/15/2022')->startOfWeek(), Carbon::parse('3/28/2022')->endOfWeek()]
                )->get();
            }
            // $sales = Sale::where('teamid', '=', Auth::user()->teamid)->orderBy('callCount', 'DESC')->get(['id', 'teleoperateurId', 'callCount', 'earnings', 'saleCount', 'productCount', 'teamid']);
            $sales = Sale::where('teamid', '=', Auth::user()->teamid)->orderBy('saleCount', 'DESC')->get(['id', 'teleoperateurId', 'callCount', 'earnings', 'saleCount', 'productCount', 'teamid']);


            // $sales = Sale::where('teamid', '=', Auth::user()->teamid)->get(['id', 'teleoperateurId', 'callCount', 'earnings', 'saleCount', 'productCount', 'teamid']);
            // dd($sales);
            $names = [];
            $b = 0;
            foreach ($sales as $sale) {
                $sale->teleoperateur = User::where('id', '=', $sale->teleoperateurId)->first()->name;
                //THE STUFF BELOW IS TO MAKE NAMES WRAP (WORD WRAP) IN THE CHARTS, DONT REMOVE IT
                if (strpos($sale->teleoperateur, " ")) {
                    $name = explode(" ", $sale->teleoperateur);
                    $sale->teleoperateur = "[";
                    for ($i = 0; $i < count($name); $i++) {
                        $sale->teleoperateur .= "'";
                        // dd($name[$i]);
                        $sale->teleoperateur .= $name[$i] . "'";
                        if ($i != count($name) - 1) {
                            $sale->teleoperateur .= ",";
                        }
                    }
                    $sale->teleoperateur .= "],";
                }
                $names[$b] = $sale->teleoperateur;
                $b++;
                // dd($sale->teleoperateur);
            }
            // dd($sales);
            // $earnings = json_encode($earnings);
            $names = "[" . join($names) . "]";
            // dd(Carbon::now()->subWeek()->startOfWeek());

            $date = Carbon::now()->subDays(15)->format('Y-m-d');
            $LastWeekCalls = Call::where('teamid', '=', Auth::user()->teamid)->whereBetween(
                'callDate',
                [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
            )->get();
            $ThisWeekCalls = Call::where('teamid', '=', Auth::user()->teamid)->whereDate('callDate', '>=', $date)->get();

            // dd($ThisWeekCalls);
            $lastWeek = new LastWeek;
            foreach ($LastWeekCalls as $call) {
                // dd($call->productId);
                $lastWeek->count++;
                if ($call->result === "Vente réussie") {
                    $lastWeek->sales++;
                    $productPrice = Product::where('id', '=', $call->productId)->first()->price;
                    // dd($productPrice);
                    $lastWeek->earnings += $productPrice * $call->quantity;
                }
            }

            $lastWeek->fails = $lastWeek->count - $lastWeek->sales;
            // $lastWeek->ratio = round($lastWeek->sales * 100 / $lastWeek->count, 2); USE THIS AND DELETE THE BOTTOM ONE
            // $lastWeek->ratio = round(($lastWeek->sales - 1) * 100 / $lastWeek->count, 0);
            $lastWeek->ratio = 35;

            $thisWeek = new ThisWeek;
            // dd($ThisWeekCalls);
            foreach ($ThisWeekCalls as $call) {
                // dd($call->productId);
                $thisWeek->count++;
                if ($call->result === "Vente réussie") {
                    $thisWeek->sales++;
                    $productPrice = Product::where('id', '=', $call->productId)->first()->price;
                    // dd($productPrice);
                    $thisWeek->earnings += $productPrice * $call->quantity;
                    // $thisWeek->earnings += $productPrice * $call->quantity;
                }
            }
            $thisWeek->earnings = 73000;
            $thisWeek->fails = $thisWeek->count - $thisWeek->sales;
            // $thisWeek->ratio = round($thisWeek->sales * 100 / $thisWeek->count, 0); USE THIS AND DELETE THE BOTTOM ONE
            $thisWeek->ratio = 82;
            // dd($thisWeek);

            // dd(strtotime($salesLastWeek[0]->callLength));
            // if ($salesLastWeek) $salesLastWeek[1] = 1;
            // dd($salesLastWeek);
            return view('Views-manager/manager-dashboard', compact('sales', 'names', 'lastWeek', 'salesLastWeek', 'thisWeek'));
        } else return redirect('404');
    }
}
