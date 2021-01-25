@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.meta_tags')
@endsection

@section('frontend_title')
    {{ $blogCategory->name . ' - Category' }}
@endsection

@section('frontend_content')
    
    <!-- Blog Posts section -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center">
        <div class="w-100">
            <!-- search form -->
            @include('layouts.templates.frontend.search_form')
            <h4 class="text-center text-muted text-normal text-bn border-bottom mb-3">Category: {{ $blogCategory->name }}</h4>
            
            <!-- Blog Posts -->
            @include('layouts.templates.frontend.all_post')
            
            <!-- Pagination -->
            @include('layouts.templates.frontend.pagination')

            <!-- blog categories -->
            @include('layouts.templates.frontend.blog_categories')
        </div>
    </section>

@endsection