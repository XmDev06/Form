<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Izohlar extends Component
{
    public $comments;
    public $post;

    public function mount($post,$comments )
    {
        $this->comments = $comments;
        $this->post = $post;
    }


    protected $listeners = [
        'izoh'=>'comments',
    ];

    public function comments()
    {
        $this->comments=\App\Models\Comment::where('post_id', $this->post->id)->latest()->get();
    }

    public function render()
    {
        return view('livewire.izohlar');
    }
}
