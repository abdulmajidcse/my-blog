@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.default_meta_tags')
@endsection

@section('frontend_title')
    {{ 'Home' }}
@endsection

@section('blog_content')

    @foreach ($blogPosts as $blogPost)
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
                    <div style="max-width: 400px;">
                        <a href="{{ route('frontend.blog.post', $blogPost->slug) }}"><img src="{{ asset('assets/uploads/'.$blogPost->image) }}" alt="{{ $blogPost->name }}" class="img img-thumbnail w-100"></a>
                    </div>
                @endif

                <!-- /.user-block -->
                <div>
                    <p>{!! Str::words($blogPost->content, 60) !!}</p>
                </div>
            </div>

            {{-- read more --}}
            <div>
                <p><a href="{{ route('frontend.blog.post', $blogPost->slug) }}" class="btn btn-sm btn-dark btn-flat">Read More</a></p>
            </div>

        </div>
        <!-- /.post -->
    @endforeach

    {{-- See More --}}
    <div class="float-right">
        {{ $blogPosts->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection