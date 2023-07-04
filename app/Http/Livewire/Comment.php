<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $post;
    public $comments;
    public $izoh;


    public function mount($post, $comments)
    {
        $this->post = $post;
        $this->comments = $comments;
    }

    protected $rules = [
        'izoh'=>'required|min:2'
    ];

    public function save()
    {

        $this->validate();

        \App\Models\Comment::create([
            'comment'=>$this->izoh,
            'user_id'=>auth()->user()->id,
            'post_id'=>$this->post->id,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        $this->emit('izoh');

        $this->izoh = '';
    }



    public function render()
    {
        return view('livewire.comment');
    }
}
