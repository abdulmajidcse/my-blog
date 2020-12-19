@extends('layouts.frontend_app')

@section('frontend_title')
    {{ '404' }}
@endsection

@section('blog_content')

<h1 class="font-weight-bold text-center text-danger"> 404</h1>

<div class="error-content">
    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page not found.</h3>

    <p>
        We could not find the page you were looking for.
        However, you may <a href="{{ route('frontend.home') }}">return to home</a>.
    </p>
</div>
<!-- /.error-content -->

@endsection