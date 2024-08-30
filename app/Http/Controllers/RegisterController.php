<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
        'return' =>'Register',
        'active' => 'register'
        ]);
    }


    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
            'password' => 'required|unique:users',
            'password_confirm' => 'required|same:password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);       
        User::create($validatedData);

        return redirect('/login')->with('success','Regristasi sukses! Silahkan Login');
    }
}
