<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use \Illuminate\Http\RedirectResponse;
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
            ]);
            $newMember = User::create([
                'name' => ucwords($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->accountTypeChoice,
                'teamid' => Auth::user()->teamid, //THIS IS TO GET "TEAMID" OF THE NEW MEMBER OF THE TEAM TO BE EQUIVALENT WITH THE "TEAMID" OF THE MANAGER
            ]);
            event(new Registered($newMember));
            return redirect('/equipe');
        } else return redirect('404');
    }
    public function listTeamMembers(Request $request)
    {
        $users = User::where('type', '!=', 'manager')->where('teamid', '=', Auth::user()->teamid)->get(['name', 'email', 'type']);
        // dd($users);
        $TeleCount = 0;
        $CommCount = 0;
        foreach ($users as $i) {
            if ($i->type == "teleoperateur") {
                $TeleCount++;
            } elseif ($i->type == "commercial") {
                $CommCount++;
            }
        }
        // dd($vars);
        return view('Views-manager/manager-equipe', compact('users', 'TeleCount', 'CommCount'));
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
            $products = Product::where('teamid', '=', 14)->get(['id', 'name', 'price', 'quantity']);
            $prodCount = 0;
            foreach ($products as $product) {
                $prodCount++;
            }
            // dd($vars);
            return view('Views-manager/manager-produits', compact('products', 'prodCount'));
        }
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
    public function modifyProduct(Request $request)
    {
        // $test =  intval(Product::where('id', '=', $request->prodId)->first()->value('teamid'));
        // dd($request);
        // dd(Product::where('id', '=', $request->prodId)->first()->value('teamid'));
        if (Auth::user()->type === 'manager' && intval(Auth::user()->id) == Product::where('id', '=', $request->prodId)->first()->value('teamid')) {
            $attributes = $request->validate([
                'prodName' => ['required', 'string', 'max:200'],
                'prodPrice' => ['required', 'numeric'],
                'prodQuantity' => ['required', 'integer'],
            ]);
            $product = Product::where('id', '=', $request->prodId)->first();
            $product->name = $request->prodName;
            $product->price = $request->prodPrice;
            $product->quantity = $request->prodQuantity;
            $product->save();
            return redirect('/produits');
        } else return redirect('404');
    }
    public function deleteProduct(Request $request)
    {
        $product = Product::where('id', '=', $request->deleteProdId)->first();
        if (Auth::user()->type === 'manager' && intval(Auth::user()->id) == intval($product->teamid)) {
            $product->delete();
            //TODO: DELETE THIS PRODUCT'S DATA ELSEWHERE
            return redirect('/produits');
        } else return redirect('404');
    }
}
