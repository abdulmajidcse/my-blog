{{-- Setting --}}
@php
$setting = \App\Models\Setting::first();
@endphp

@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.meta_tags')
@endsection

@section('frontend_title')
    {{ 'Home' }}
@endsection

@section('frontend_content')
    <!-- about section -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
        <div class="w-100">
            <h3 class="mb-3">Hi, I'm Abdul
                <span class="text-primary">Majid!</span>
            </h3>
            <p class="lead text-justify">Hi, I'm Md. Abdul Majid. I'm a Web Developer. I'm currently working on Laravel
                and ReactJS. Programming is my love, not only a profession!</p>
            <p class="lead mb-5 text-justify">I share my journey on this blog, mostly technical. I enjoy building new things
                and maybe at this very moment
                I am building something new. Follow me to stay updated.</p>
            <div class="social-icons">
                <h4 class="text-capitalize">Connect with me</h4>
                <a href="{{ $setting && $setting->github_link ? $setting->github_link : '#' }}" data-toggle="tooltip"
                    data-placement="top" title="Github" target="_blank">
                    <i class="fab fa-github"></i>
                </a>
                <a href="{{ $setting && $setting->linkedin_link ? $setting->linkedin_link : '#' }}" data-toggle="tooltip"
                    data-placement="top" title="LinkedIn" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="{{ $setting && $setting->twitter_link ? $setting->twitter_link : '#' }}" data-toggle="tooltip"
                    data-placement="top" title="Twitter" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="{{ $setting && $setting->facebook_link ? $setting->facebook_link : '#' }}" data-toggle="tooltip"
                    data-placement="top" title="Facebook" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="{{ $setting && $setting->youtube_link ? $setting->youtube_link : '#' }}" data-toggle="tooltip"
                    data-placement="top" title="YouTube" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </section> <!-- end of about section -->

    <hr class="m-0">

    <!-- recent posts section -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="recent-posts">
        <div class="w-100">
            <h3 class="mb-5">Recent Blog Posts</h3>

            @if ($blogPosts->count() > 0)
                @include('layouts.templates.frontend.all_post')

                <p class="text-center mt-1"><a href="{{ route('frontend.blog.index') }}"
                        class="btn btn-flat btn-danger font-weight-bold"> See More Posts </a></p>

                <!-- blog categories -->
                @include('layouts.templates.frontend.blog_categories')
            @else
                <h3 class="font-weight-bold text-center text-danger"> Comming soon...</h3>
                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! No Post Available.</h3>
                    <p>We could not find any post you were looking for.</p>
                </div>
            @endif

        </div>

    </section> <!-- end of recent posts section -->

@endsection
