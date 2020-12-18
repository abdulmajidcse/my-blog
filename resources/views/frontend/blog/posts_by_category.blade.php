@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.default_meta_tags')
@endsection

@section('frontend_title')
    {{ $blogCategory->name . ' - Category' }}
@endsection

@section('blog_content')
    <h2 class="text-center text-muted font-weight-bold border-bottom">Category: {{ $blogCategory->name }}</h2>
    @foreach ($blogPosts as $blogPost)
        <!-- Post -->
        <div class="post">
            <div class="user-block">
                <h3 class="font-weight-bold mb-0"><a href="{{ route('frontend.blog.post', $blogPost->slug) }}"> {{ $blogPost->name }} </a></h3>
                <span class="small">
                    @if ($blogPost->BlogCategory)
                        Category - <a href="{{ route('frontend.blog.category', $blogPost->blogCategory->slug) }}" class="font-weight-bold">{{ $blogPost->BlogCategory->name }}</a>, 
                    @endif
                     Publish - {{ date_format($blogPost->created_at, 'M d, Y') }}
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