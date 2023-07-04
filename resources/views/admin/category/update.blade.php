<x-body>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update category</h4>
                    <form class="forms-sample" method="post" action="{{route('category.update', $category->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input name="name" type="text" class="form-control" id="title" placeholder="Title"
                                   value="{{$category->name}}">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{route('category.index')}}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-body>
