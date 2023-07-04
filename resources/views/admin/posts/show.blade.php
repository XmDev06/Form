<x-body>
    <div class="row">
        <div class="col-md-4">
            <img style="width:100%" src="{{asset("images/".$post->image)}}" alt="image">
        </div>
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-4" href="{{route('posts.index')}}">Back</a>
                    <h4 class="text-success">User id: <span class="text-white">{{$post->user_id}}</span></h4>

                    <hr class="dropdown-divider">

                    <h4 class="text-success">Title: </h4>
                    <p>{{$post->title}}</p>
                    <hr class="dropdown-divider">

                    <h4 class="text-success">Description: </h4>
                    <p>{{$post->description}}</p>




                </div>
            </div>
        </div>

    </div>
</x-body>
