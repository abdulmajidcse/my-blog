{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@extends('layouts.frontend_app')

@section('frontend_title')
    {{ '403' }}
@endsection

@section('frontend_content')

<!-- 403 section -->
<section class="resume-section p-3 p-lg-5 d-flex align-items-center">
    <div class="w-100">
        <h1 class="font-weight-bold text-center text-danger">403</h1>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! {{ __($exception->getMessage() ?: 'Forbidden') }}.</h3>

            <p>We could not find the page you were looking for. However, you may <a href="{{ route('frontend.home') }}">return to home</a>.</p>
        </div>
    </div>
</section>

@endsection