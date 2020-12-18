@extends('layouts.frontend_app')

@section('frontend_title')
    {{ '404' }}
@endsection

@section('blog_content')

<div class="error-page">
    <h2 class="headline text-danger"> 404</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page not found.</h3>

        <p>
            We could not find the page you were looking for.
            However, you may <a href="{{ route('frontend.home') }}">return to home</a>.
        </p>
    </div>
    <!-- /.error-content -->
</div>
<!-- /.error-page -->

@endsection