<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credential = ["username" => "admin", "password" => $request->password];
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect("/")->with("login_success", true);
        }

        return view("login", ["error" => "Password Salah"]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with("logout_success", true);
    }
}
