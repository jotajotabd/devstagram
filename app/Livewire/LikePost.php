<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;

    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user()) ? true : false;
    }
    public function like()
    {
        // dd($this->post->likes);

        if ($this->post->checkLike(auth()->user()))
        {
            auth()->user()->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
        }else
        {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
