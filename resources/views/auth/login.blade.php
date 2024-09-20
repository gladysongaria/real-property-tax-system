@extends('auth.master')
@section('content')

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3><strong>Welcome</strong></h3>
            <center><span>Please enter your details</span></center>

            @error('username')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="username"><strong>Username</strong></label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
                        required autofocus />
                </div>
                <br>

                <div class="form-group">
                    <label for="username"><strong>Password</strong></label>
                    <input type="password" class="form-control" id="password" name="password" value="" />
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                        </div>
                        <div class="col">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="ForgetPwd">Forget Password?</a>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" class="btnSubmit" value="Login" />
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
