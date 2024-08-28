<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request-> get('username'));

        // Modificar request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $this->validate($request,[
            'name' => 'required|min:3|max:10',
            'username' => 'required|unique:users|min:10|max:30',
            'email' => 'required|unique:users|email|max:30',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'name' => $request -> name,
            'username' => $request -> username,
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);
    }
}