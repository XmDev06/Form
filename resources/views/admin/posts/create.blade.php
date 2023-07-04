<x-body>
    <div class="row">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4 class="card-title">Create post</h4>
                    <form action="{{route('posts.store')}}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Enter description"
                                      name="description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @php
                                    $users = \App\Models\User::all();
                                @endphp
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">File upload</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Upload an image">
                        </div>
                        <div class="form-group">
                            <label for="user_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @php
                                    $categories = \App\Models\Category::all();
                                @endphp
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="created_at" value="{{\Carbon\Carbon::now()}}">
                        <input type="hidden" name="updated_at" value="{{\Carbon\Carbon::now()}}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-body>
