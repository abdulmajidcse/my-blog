@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Profile'}}
@endsection

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Profile</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus />

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Password change block --}}
                <div class="card card-outline card-primary">
                    <div class="card-header">
                      <h3 class="card-title">
                        If you want to change password.
                      </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
        
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
        
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" class="form-control" name="new_password_confirmation">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
        <!-- /.card-body -->

    </div>

@endsection