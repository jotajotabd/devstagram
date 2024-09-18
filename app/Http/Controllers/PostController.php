<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Session\Middleware\StartSession;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard'); 
    }
}
