<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public function like()
    {
        return "Hola mundo...";
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
