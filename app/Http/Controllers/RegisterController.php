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

        // User::create([
        //     'name' => $request -> name,
        //     'username' => $request -> username,
        //     'email' => $request -> email,
        //     'password' => Hash::make($request -> password)
        // ]);

        // Otra forma de crear registros en una BD
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request -> password);
        $user->save();

        // Autenticar

        // auth()-> attempt([
        //     'email' => $request -> email,
        //     'password' => $request -> password
        // ]);

        //Otra forma de autenticar

        auth()->attempt($request->only('email','password'));

        // Redireccionar

        return redirect()->route('posts.index', auth()->user()->username);

    }
}