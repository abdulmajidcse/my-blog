@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.default_meta_tags')
@endsection

@section('frontend_title')
    {{ $searchValue . ' - Search' }}
@endsection

@section('blog_content')

    <h2 class="text-center text-muted font-weight-bold border-bottom">Search for: {{ $searchValue }}</h2>

    <div class="row">
        @foreach ($blogPosts as $blogPost)
            <div class="col-md-6">
                <!-- Post -->
                <div class="post">

                    {{-- post thumbnail --}}
                    @if ($blogPost->image)
                        <a href="{{ route('frontend.blog.post', $blogPost->slug) }}"><img src="{{ asset('assets/uploads/'.$blogPost->image) }}" alt="{{ $blogPost->name }}" class="img w-100"></a>
                    @endif

                    <div class="user-block mt-2">
                        <h4 class="font-weight-bold mb-0"><a href="{{ route('frontend.blog.post', $blogPost->slug) }}"> {{ $blogPost->name }} </a></h4>
                    </div>

                    <!-- /.user-block -->
                    <div>
                        <p>{!! Str::words($blogPost->content, 20) !!}</p>
                    </div>

                    {{-- read more --}}
                    <div>
                        <p><a href="{{ route('frontend.blog.post', $blogPost->slug) }}" class="btn btn-sm btn-success font-weight-bold">Read More</a></p>
                    </div>

                </div>
                <!-- /.post -->
            </div>
        @endforeach
    </div>

    {{-- See More --}}
    <div class="float-right">
        {{ $blogPosts->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection