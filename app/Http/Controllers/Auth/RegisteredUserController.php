<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $lastid = Model::latest()->first() + 1;
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // if (!array_key_exists('teamid', $attributes)) {
        //     $attributes["teamid"] = $lastid;
        // }
        // $request["teamid"] = $attributes["teamid"];

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "manager",
            'teamid' => DB::table('users')->latest()->first()->id + 1, //THIS IS TO GET "TEAMID" TO BE EQUIVALENT WITH THE "ID" OF THE NEW MANAGER AND WHOLE TEAM
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect('/dashboard');
    }
}
