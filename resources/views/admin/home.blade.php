@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Home | ' . config('app.name') }}
@endsection

@section('admin_content')

    @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    

    You are Logged in!

@endsection
