<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        $user->followers()->attach(auth()->user()->id);
        return back()->with('mensaje', 'Has seguido a ' . $user->username);
    }

    public function destroy(User $user)
    {
        $user->followers()->detach(auth()->user()->id);
        return back()->with('mensaje', 'Has dejado de seguir a ' . $user->username);
    }
}
