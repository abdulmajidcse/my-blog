@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.default_meta_tags')
@endsection

@section('frontend_title')
    {{ $blogPost->name }}
@endsection

@push('frontend_styles')
    
    <style>
        /* Social share icon style */
        .social-share a i{
            font-size: 30px;
        }
    </style>

@endpush

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

        {{-- Social Share --}}
        @include('layouts.templates.share')

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

            {{-- Social Share --}}
            @include('layouts.templates.share')


            {{-- Post tags --}}
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


    {{-- Copy link modal --}}
    <div class="modal fade" id="copyLinkModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="copyLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="copyLinkModalLabel">Post Link</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <!-- The text field -->
                <input type="text" value="{{ Request::url() }}" id="copyLinkValue" class="form-control">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-flat btn-success" data-dismiss="modal" onclick="copyPostLink()">Copy</button>
            </div>
        </div>
        </div>
    </div>

@endsection

@push('frontend_scripts')

    <!-- sweet alert -->
    <script src="{{ asset('assets/js/sweetalert2010.min.js') }}"></script>
    
    <script>

        function copyPostLink() {
            /* Get the text field */
            let copylink = document.getElementById("copyLinkValue");

            /* Select the text field */
            copylink.select();
            copylink.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            setTimeout(function() {
                Swal.fire({
                    icon: 'success',
                    text: 'Copied the link.',
                })
            }, 1000)
        }

    </script>

@endpush