{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}

@extends('layouts.frontend_app')

@section('frontend_title')
    {{ '404' }}
@endsection

@section('frontend_content')

<!-- 404 section -->
<section class="resume-section p-3 p-lg-5 d-flex align-items-center">
    <div class="w-100">
        <h1 class="font-weight-bold text-center text-danger">404</h1>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Not Found.</h3>

            <p>We could not find the page you were looking for. However, you may <a href="{{ route('frontend.home') }}">return to home</a>.</p>
        </div>
    </div>
</section>

@endsection