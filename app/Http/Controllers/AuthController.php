<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credential = ["username" => $request->username, "password" => $request->password];
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect("/");
        }

        return view("login", ["error" => $request->password]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
