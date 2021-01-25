@extends('layouts.frontend_app')

@section('frontend_title')
    No Post Available
@endsection

@section('frontend_content')

<!-- no post available section -->
<section class="resume-section p-3 p-lg-5 d-flex align-items-center">
    <div class="w-100">
        @if(isset($searchValue))
            <h2 class="text-center text-muted font-weight-bold border-bottom">Search for: {{ $searchValue }}</h2>
        @else
            <h2 class="font-weight-bold text-center text-danger"> Comming soon...</h2>
        @endif

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! No Post Available.</h3>
            <p>We could not find any post you were looking for. However, you may <a href="{{ route('frontend.home') }}">return to home</a>.</p>
        </div>
    </div>
</section>

@endsection