<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HomeController extends Controller implements HasMiddleware
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function middleware():array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    public function __invoke()
    {
        // Obtenemos a quienes seguimos
        // Pluck nos va a traer unicamente ciertos campos
        $ids = auth()->user()->following->pluck('id')->toArray();

        // WhereIn filtra un arrays (filtramos por 'user_id' en el modulo Post)
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home',[
            'posts' => $posts
        ]);
    }
}
