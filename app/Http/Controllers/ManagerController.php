<?php

namespace App\Http\Controllers;

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
                'name' => $request->name,
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
        // return view('Views-manager/test', compact('users'));
    }
}
