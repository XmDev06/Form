<x-body>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('post')}}" class="btn btn-warning mb-4">Postlar</a>
                    <a href="{{route('posts.create')}}" class="btn btn-success mb-4">Create post</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
{{--                            <th>Description</th>--}}
                            <th>User id</th>
                            <th>Category</th>
                            <th>Image</th>
{{--                            <th>Created at</th>--}}
{{--                            <th>Updated at</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
{{--                                <td>{{$post->description}}</td>--}}
                                <td>{{$post->user_id}}</td>
                                <td>{{\App\Models\Category::find($post->category_id)->name}}</td>
                                <td>
                                    <img src="{{asset("images/".$post->image)}}" alt="images">
                                </td>
{{--                                <td>{{$post->created_at}}</td>--}}
{{--                                <td>{{$post->updated_at}}</td>--}}

                                <td>
                                    <a class="btn btn-primary" href="{{route('posts.show', $post->id)}}">Show</a>
                                    <a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">Update</a>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post"
                                          style="display: inline-block">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-body>
<!--
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
-->
