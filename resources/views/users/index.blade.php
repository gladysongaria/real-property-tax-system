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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="datatable_wrapper" class="float-end">
                        @if(Auth::user()->user_role === 'Super_Admin')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createUser">Create User</button>
                        @endif


                        @include('users.create')

                    </div>

                    <div>
                        <h4 class="mb-sm-0">User Information</h4>
                    </div> <br>

                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Users</th>
                                    <th>Position</th>
                                    <th>User Role</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->last_name}}, {{$user->first_name}}, {{$user->middle_name}}</td>
                                    <td>{{$user->position}}</td>
                                    <td>{{$user->user_role}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div class="row">
                                            @if(Auth::user()->user_role === 'Super_Admin')
                                            <div class="col-1">
                                                <a data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}"
                                                    type="button"><i class="bi bi-pen"></i>
                                                </a>
                                            </div>

                                            <div class="col">
                                                <a data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                {{-- Delete Modal --}}

                                <div class="modal fade" id="delete{{ $user->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this user?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>

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
                </div>
            </div>
        </div>
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
