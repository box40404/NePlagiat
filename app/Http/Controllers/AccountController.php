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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); //напрямую пароль не хэширован нужно регаться через сайт

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

        
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");

        $user->save();

        Auth::login($user);

        return redirect("/");

    }
}
