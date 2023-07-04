@php

    $likesPost = \Illuminate\Support\Facades\DB::select("SELECT post_id, COUNT(*) as likes FROM likes WHERE post_id = $post->id GROUP BY post_id")[0]->likes??0;
    $isLiked =\Illuminate\Support\Facades\DB::table('likes')->where('user_id', auth()->user()->id)->where('post_id', $post->id)->get()->all() === [];

    $color='';
    if (!$isLiked){
        $color = 'text-danger';
    }else{
        $color = 'text-white';
    }
@endphp

<li class="tag__item">
    <form wire:submit.prevent="save" id="form_id">
        @csrf

        <button type="submit" class="text-white" style="background: inherit; border: none">
            <a>
                <i class="fa-solid fa-heart {{$color}}"> </i> {{$likesPost}} likes
            </a>
        </button>
    </form>
</li>
