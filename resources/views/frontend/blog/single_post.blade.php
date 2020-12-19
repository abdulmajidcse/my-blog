@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.default_meta_tags')
@endsection

@section('frontend_title')
    {{ $blogPost->name }}
@endsection

@section('blog_content')

    {{-- facebook comment plugin --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="pvTYXP2P"></script>

    <!-- Post -->
    <div class="post">
        <div class="user-block">
            <h3 class="font-weight-bold mb-0"><a href="{{ route('frontend.blog.post', $blogPost->slug) }}"> {{ Str::title($blogPost->name) }} </a></h3>
            <span class="small">
                @if ($blogPost->BlogCategory)
                    <i class="fas fa-layer-group mr-1"></i> <a href="{{ route('frontend.blog.category', $blogPost->blogCategory->slug) }}" class="font-weight-bold mr-2">{{ $blogPost->BlogCategory->name }}</a>
                @endif
                <i class="fas fa-calendar-alt mr-1"></i> <span class="font-weight-bold">{{ date_format($blogPost->created_at, 'M d, Y') }}</span>
            </span>
        </div>

        <div>
            {{-- post thumbnail --}}
            @if ($blogPost->image)
                <div class="magnific_image_container">
                    <a href="{{ asset('assets/uploads/'.$blogPost->image) }}"><img src="{{ asset('assets/uploads/'.$blogPost->image) }}" alt="{{ $blogPost->name }}" class="img img-thumbnail w-100"></a>
                </div>
            @endif

            <!-- /.user-block -->
            <div>
                <p>{!! $blogPost->content !!}</p>
            </div>

            <div class="mt-3">
                <span class="btn btn-flat btn-dark"><i class="fas fa-tags"></i> Tags: </span> {{ Str::title($blogPost->meta_keyword) }}
            </div>

        </div>

    </div>
    <!-- /.post -->

    {{-- leave a comment --}}
    <div>
        <h2 class="text-muted font-weight-bold">Leave a comment</h2>

        {{-- facebook comment --}}
        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

    </div>

@endsection