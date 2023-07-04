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
                    <h4 class="card-title">Create category</h4>
                    <form action="{{route('category.store')}}" method="post" class="forms-sample" >
                        @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter name" name="name">
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
