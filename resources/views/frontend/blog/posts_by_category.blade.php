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
            <h2 class="text-center text-muted font-weight-bold border-bottom">Category: {{ $blogCategory->name }}</h2>
            
            <!-- Blog Posts -->
            @include('layouts.templates.frontend.all_post')
            
            <!-- Pagination -->
            @include('layouts.templates.frontend.pagination')
        </div>
    </section>

@endsection