<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class RegisterController extends Controller
{
    // public static $teamid = 0;
    public function create()
    {
        return view('create');
    }
    public function login()
    {
        return view('login');
    }
    public function store()
    {
        // static::$teamid = static::$teamid + 1;
        $attributes = request()->validate([
            "name" => 'required|max:200',
            "email" => 'required|email|max:200|unique:users,email',
            "password" => 'required|max:200',
            "remember_token" => '',
            "teamid" => '',
        ]);
        $attributes["type"] = "manager";
        $attributes["password"] = bcrypt($attributes["password"]);
        if (!array_key_exists('remember_token', $attributes)) {
            $attributes["remember_token"] = "off";
        }
        // if (!array_key_exists('teamid', $attributes)) {
        //     $attributes["id"] = "0";
        // }
        // $attributes["teamid"] = static::$teamid;
        $attributes["id"] = User::orderBy('id', 'desc')->take(1)->first()->id + 1;
        //dd($attributes);
        $user = User::create($attributes);

        auth()->login($user);
        // dd($attributes["id"]);



        return redirect('/dashboard');
    }
}
