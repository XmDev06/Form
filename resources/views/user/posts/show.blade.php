@extends('layouts.bootstrap')
@section('content')
    @livewireStyles
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 mt-5">
                @foreach($posts as $post)
                    @php
                        $comments = \App\Models\Comment::where('post_id', $post->id)->latest()->get();

                        $likesPost = \Illuminate\Support\Facades\DB::select("SELECT post_id, COUNT(*) as likes FROM likes WHERE post_id = $post->id GROUP BY post_id")[0]->likes??0;
                        $isLiked =\Illuminate\Support\Facades\DB::table('likes')->where('user_id', auth()->user()->id)->where('post_id', $post->id)->get()->all() === [];
                        if (!$isLiked){
                            $color = 'text-danger';
                        }else{
                            $color = 'text-white';
                        }
                    @endphp

                    <article class="postcard dark blue">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="{{asset("images/".$post->image)}}" alt="Image Title"/>
                        </a>
                        <div class="postcard__text">
                            <h1 class="postcard__title blue"><a
                                    href="{{route('post.show', $post)}}">{{$post->title}}</a></h1>
                            <div class="postcard__subtitle small">
                                <time>
                                    <i class="fas fa-calendar-alt mr-2"></i> {{ $post->created_at->isoFormat('dddd MMMM DD YYYY') }}
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">{{$post->description}}</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item">
                                    <a href="{{route('post')}}?category_id={{$post->category_id}}">
                                        <i class="fas fa-tag mr-2"></i> {{\App\Models\Category::find($post->category_id)->name}}
                                    </a>
                                </li>

                                    @livewire('like',['post'=>$post])

                            </ul>
                        </div>
                    </article>



                    <div class="d-flex justify-content-center row mb-5" style="background-color: #18151f;">
                        <div class="d-flex flex-column col-md-12">
                            <div class="coment-bottom p-2 px-4">

                                @livewire('comment',['post'=>$post, 'comments'=>$comments])
                                @livewire('izohlar',['post'=>$post, 'comments'=>$comments])


                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @livewireScripts
@endsection

