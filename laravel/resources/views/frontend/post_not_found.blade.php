@extends('layouts.frontend_app')

@section('frontend_title')
    No Post Available
@endsection

@section('frontend_content')

<!-- no post available section -->
<section class="p-3 p-lg-5 d-flex align-items-center">
    <div class="w-100">
        <!-- search form -->
        @include('layouts.templates.frontend.search_form')
        
        @if(isset($searchValue))
            <h4 class="text-center text-muted text-normal text-bn border-bottom mb-3">Search For: {{ $searchValue }}</h4>
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