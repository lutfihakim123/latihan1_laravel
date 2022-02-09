<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login', [
            "title" => "Login Page"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => ['email:dns', 'required'],
            "password" => ['required']
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');

        }

        return back()->with('LoginError', "Login Failed");

        // return back()->withErrors([
        //     'email' => "Your Email Is Not Register",
        //     'password' => "Password Wrong"
        // ]);
        
    }


    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

}
