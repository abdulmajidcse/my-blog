@extends('layouts.frontend_app')

@section('frontend_title')
    {{ 'No Post Available' }}
@endsection

@section('blog_content')

@isset($blogCategory)
    <h2 class="text-center text-muted font-weight-bold border-bottom">Category: {{ $blogCategory->name }}</h2>
@endisset

@if(isset($searchValue))
    <h2 class="text-center text-muted font-weight-bold border-bottom">Search for: {{ $searchValue }}</h2>

@else
    <h1 class="font-weight-bold text-center text-danger"> Comming soon...</h1>
@endif

<div class="error-content">
    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! No Post Available.</h3>

    <p>
        We could not find any post you were looking for.
        However, you may <a href="{{ route('frontend.home') }}">return to home</a>.
    </p>
</div>
<!-- /.error-content -->

@endsection