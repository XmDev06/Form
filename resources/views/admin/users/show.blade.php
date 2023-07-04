<x-body>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-4" href="{{route('users.index')}}">Back</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-body>
