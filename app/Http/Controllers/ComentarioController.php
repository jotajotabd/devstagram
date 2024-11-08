<?php

namespace App\Http\Controllers;
use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request,User $user, Post $post)
    {
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        //Almacenar resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id'=> $post->id,
            'comentario'=> $request->comentario
        ]);
        //Imprimir mensaje
        return back()->with('mensaje', '¡Comentario publicado correctamente!');

    }

    public function destroy(Request $request, Comentario $comentario)
    {
        $request->user()->comentarios()->delete('id', $comentario->id);

        return back()->with('mensaje', '¡Comentario eliminado!');
    }
}
