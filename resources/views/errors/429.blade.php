{{-- @extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests')) --}}

@extends('layouts.frontend_app')

@section('frontend_title')
    {{ '429' }}
@endsection

@section('frontend_content')

<!-- 429 section -->
<section class="resume-section p-3 p-lg-5 d-flex align-items-center">
    <div class="w-100">
        <h1 class="font-weight-bold text-center text-danger">429</h1>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Too Many Requests.</h3>

            <p>We could not find the page you were looking for. However, you may <a href="{{ route('frontend.home') }}">return to home</a>.</p>
        </div>
    </div>
</section>

@endsection