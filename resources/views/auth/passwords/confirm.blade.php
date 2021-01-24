@extends('auth.layouts.auth_app')

@section('auth_title')
    Confirm Password
@endsection

@section('auth_content')

    <p class="login-box-msg">Please confirm your password before continuing.</p>
    
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    @if (Route::has('password.request'))
        <p class="mb-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
        </p>
    @endif

@endsection
