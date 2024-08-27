<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $this->validate($request,[
            'name' => 'required|min:3|max:10',
            'username' => 'required|unique:users|min:10|max:30',
            'email' => 'required|unique:email|max:30',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
    }
}