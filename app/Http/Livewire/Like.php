<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;

class Like extends Component
{

    public $post;
    public $user_id;


    public function mount($post)
    {
        $this->user_id=auth()->user()->id;
        $this->post = $post;
    }

    public function save()
    {

        $like = \App\Models\Like::where('user_id', $this->user_id)->where('post_id', $this->post->id)->get();


        $isLiked = $like->all() === [];

        if ($isLiked) {
            \App\Models\Like::create([
                'user_id'=>$this->user_id,
                'post_id'=>$this->post->id,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);

        } else {
            \App\Models\Like::find($like[0]->id)->delete();
        }
    }



    public function render()
    {
        return view('livewire.like');
    }


}
