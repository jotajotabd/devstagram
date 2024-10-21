<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Session\Middleware\StartSession;

class PostController extends Controller
{

    public function index(User $user)
    {
        return view('dashboard',[
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
    }
}
