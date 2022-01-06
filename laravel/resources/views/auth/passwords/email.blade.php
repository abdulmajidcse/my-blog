@extends('auth.layouts.auth_app')

@section('auth_title')
    Forget Password
@endsection

@section('auth_content')

    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    
    @if (session('status'))
        <p class="alert alert-success" role="alert">
            {{ session('status') }}
        </p>
    @endif
  
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    
    <p class="mb-1">
        <a href="{{ route('login') }}">Back to Login</a>
    </p>

@endsection
