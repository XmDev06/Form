<x-body>
    <div class="row">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create user</h4>
                    <form action="{{route('users.store')}}" method="post" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password"
                                   name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-body>
