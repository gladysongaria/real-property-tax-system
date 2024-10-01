{{-- Edit Modal --}}
<div class="modal fade" id="editUser{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">
                    Edit User</h5>
            </div>

            <form action="{{ route('users.update', $user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="modal-body">
                    <div class="row">

                        {{-- last name --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input name='last_name' class="form-control" type="text"
                                        value="{{ old('last_name', $user->last_name) }}">
                                    @error('last_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- first name --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"> <br>
                                <label class="form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input name='first_name' class="form-control" type="text"
                                        value=" {{ old('first_name', $user->first_name) }}">
                                </div>
                            </div>
                        </div>

                        {{-- middle name --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"> <br>
                                <label class="form-label">Middle Name</label>
                                <div class="col-sm-10">
                                    <input name='middle_name' class="form-control" type="text"
                                        value=" {{ old('middle_name', $user->middle_name) }}">
                                </div>
                            </div>
                        </div>

                        {{-- position --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"> <br>
                                <label class="form-label">Position</label>
                                <div class="col-sm-10">
                                    <input name='position' class="form-control" type="text"
                                        value=" {{ old('position', $user->position) }}">
                                </div>
                            </div>
                        </div>

                        {{-- user_role --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"> <br>
                                <label class="form-label">User Role</label>
                                <div class="col-sm-10"> <input name='user_role' class="form-control" type="text"
                                        value=" {{ old('user_role', $user->user_role) }}">
                                </div>
                            </div>
                        </div>

                        {{-- username --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"> <br>
                                <label class="form-label">Username</label>
                                <div class="col-sm-10"> <input name='username' class="form-control" type="text"
                                        value=" {{ old('username', $user->username) }}">
                                </div>
                            </div>
                        </div>

                        {{-- email --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"> <br>
                                <label class="form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name='email' class="form-control" type="email"
                                        value=" {{ old('email', $user->email) }}">
                                </div>
                            </div>
                        </div>

                        {{-- password --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"> <br>
                                <label class="form-label">Password</label>
                                <div class="col-sm-10">
                                    <input name='password' class="form-control" type="password"
                                        value=" {{ old('password', $user->password) }}">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info waves-effect waves-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
