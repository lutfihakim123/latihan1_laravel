<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register', [
            "title" => "Register Page"
        ]);
    }
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            "name" => 'required|max:255',
            "username" => 'required|max:255',
            "email" => 'required|max:255|unique:users|email:dns',
            "password" => 'required|min:5|max:100'
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // dd("Registasi Berhasil!!!");
        $request->session()->flash('success', 'Register Succesfull');
        return redirect('/login');

    }
}
