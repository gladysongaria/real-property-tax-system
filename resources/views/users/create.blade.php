{{-- Create Modal --}}

<div class="modal fade" id="createUser" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="create">
                    New User </h5>
            </div>

            <div class="modal-body">
                <form action="{{route('users.store')}}" method="POST">
                    @csrf
                    <div class="row">

                        {{-- last_name --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input name='last_name' class="form-control" required type="text"
                                        value="{{ old('last_name') }}">
                                </div>
                            </div>
                        </div>

                        {{-- first_name --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input name='first_name' class="form-control" required type="text"
                                        value="{{ old('first_name') }}">
                                </div>
                            </div>
                        </div>

                        {{-- middle_name --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Middle Name</label>
                                <div class="col-sm-10">
                                    <input name='middle_name' class="form-control" required type="text"
                                        value="{{ old('middle_name') }}">
                                </div>
                            </div>
                        </div>

                        {{-- position --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Position</label>
                                <div class="col-sm-10">
                                    <input name='position' class="form-control" required type="text"
                                        value="{{ old('position') }}">
                                </div>
                            </div>
                        </div>

                        {{-- user_role --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">User Role</label>
                                <div class="col-sm-10">
                                    <input name='user_role' class="form-control" required type="text"
                                        value="{{ old('user_role') }}">
                                </div>
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name='email' class="form-control" required type="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>

                        {{-- username --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Username</label>
                                <div class="col-sm-10">
                                    <input name='username' class="form-control" required type="text"
                                        value="{{ old('username') }}">
                                </div>
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Password</label>
                                <div class="col-sm-10">
                                    <input name='password' class="form-control" required type="password"
                                        value="{{ old('password') }}">
                                </div>
                            </div>
                        </div>

                        {{-- create user button --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
