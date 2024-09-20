@extends('auth.master')
@section('content')

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <span>Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one.</span>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email"><strong>Email</strong></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('username') }}"
                        required autofocus />

                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <input type="submit" class="btnSubmit" value="Email Password Reset Link" />
                </div>
            </form>
        </div>
        <div class="col-md-6 login-form-2">
            <div class="text-center">
                <img src="assets/images/blogo.png" alt="..." class="rounded">
            </div>
            <h1> <strong>
                    <p class="text-center real">Real Property Tax</p>
                </strong></h1>
            <h4>
                <p class="text-center info">INFORMATION SYSTEM</p>
            </h4>
        </div>
    </div>
</div>
@endsection
