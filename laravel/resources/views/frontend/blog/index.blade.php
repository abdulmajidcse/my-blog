@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.meta_tags')
@endsection

@section('frontend_title')
    Blog Posts
@endsection

@section('frontend_content')

    <!-- Blog Posts section -->
    <section class="p-3 p-lg-5 d-flex align-items-center">
        <div class="w-100">
            <!-- search form -->
            @include('layouts.templates.frontend.search_form')

            <!-- Blog Posts -->
            <h3 class="my-3 border-bottom">All Blog Posts</h3>
            @include('layouts.templates.frontend.all_post')

            <!-- Pagination -->
            @include('layouts.templates.frontend.pagination')
        </div>
    </section>

@endsection
