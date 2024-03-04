<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod("GET")){
            return view("account.login");
        }

        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        $remember = $request->input("remember");

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended();
        } else {
            return back()->with(
                "message", "Не найден"
            )->exceptInput("password");
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function register(Request $request)
    {
        if ($request->isMethod("GET")){
            return view("account.register");
        }

        $credentials = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required"
        ]);


        $user = new User;

        
        $user->name = $credentials["name"];
        $user->email = $credentials["email"];
        $user->password = $credentials["password"];

        $user->save();

        Auth::login($user);

        return redirect("/");

    }

}