@extends('master')
@section('content')

<div class=" content_custi">

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('success') }}
    </div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('error') }}
    </div>
    @endif

    @if(auth()->user()->user_role == 'Super_Admin')

    <div class="content p-5">
        <div class="container">

            <form action="{{route('users.store')}}" method="POST">
                @csrf

                <div class="row">
                    <h4>Add User</h4>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>Last Name</strong></label>
                            <input name='last_name' type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>First Name</strong></label>
                            <input name='first_name' type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Firstname">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>Office</strong></label>
                            <input name="office" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Office">
                        </div>
                    </div>

                    <!--------fsdffffffffff-->
                </div>
                <!--row-->
                <br>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>Username</strong></label>
                            <input name='username' type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>Password</strong></label>
                            <input name='password' type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>Role</strong></label>
                            <input name='user_role'  type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Role">
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2" type="submit">Add</button>
                </div>
            </form>
        </div>
        <!--row-->
        <br>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Office</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->last_name}}, {{$user->first_name}}, {{$user->middle_name}}</td>
                        <td>{{$user->username}}</td>
                        <td></td>
                        <td>{{$user->user_role}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if(Auth::user()->user_role === 'Super_Admin')
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editUser{{$user->id}}" type="button"><i class="bi bi-pen"></i>
                            </button>

                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#delete{{$user->id}}">
                                <i class="bi bi-trash"></i>
                            </button>
                            @endif
                        </td>
                    </tr>
                    {{-- Delete Modal --}}

                    <div class="modal fade" id="delete{{ $user->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                                    <!-- Form for deleting the user -->
                                    <form action="{{ route('users.destroy', [$user->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('users.update')
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--row-->

    </div>
    <!--container-->
</div>

@else
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-sm-0">You don't have access to this page.</h4>
            </div>
        </div>
    </div>
</div>

@endif
</div>

@endsection
