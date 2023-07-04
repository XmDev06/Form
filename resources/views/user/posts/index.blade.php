@extends('layouts.bootstrap')

@section('content')





    <div class="container mt-5">
        <div class="row">
            <!-- Main content -->
            <div class="col-lg-12 mt-5">
                @foreach($posts as $post)


                    @php
                        $comments = \Illuminate\Support\Facades\DB::select("SELECT post_id, COUNT(*) as comment FROM comments WHERE post_id = $post->id GROUP BY post_id")[0]->comment??0;

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
                                    <i class="fas fa-calendar-alt mr-2"></i> {{ $post->created_at->isoFormat('dddd MMMM DD YYYY HH:MM') }}
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">{{$post->description}}</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item">
                                    <a href="{{route('post')}}?category_id={{$post->category_id}}">
                                        <i class="fas fa-tag mr-2"></i>{{\App\Models\Category::find($post->category_id)->name}}
                                    </a>
                                </li>
                                <li class="tag__item">
                                    <a>

                                        <i class="fas fa-message mr-2">&nbsp; {{$comments}}</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form action="{{route('post.store')}}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Enter description"
                                      name="description" rows="4"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">File upload</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Upload an image">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="user_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input class="form-control" id="user_id" name="user_id" type="hidden"
                               value="{{auth()->user()->id}}">
                        <input type="hidden" name="created_at" value="{{\Carbon\Carbon::now()}}">
                        <input type="hidden" name="updated_at" value="{{\Carbon\Carbon::now()}}">


                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
