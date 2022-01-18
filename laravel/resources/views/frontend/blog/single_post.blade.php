@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.meta_tags')
@endsection

@section('frontend_title')
    {{ $blogPost->name }}
@endsection

@push('frontend_styles')

    <style>
        #single-blog-post-content {
            width: 100%;
        }

        #single-blog-post-content pre {
            background: #1E1E1E;
            color: white;
            padding: 8px;
            overflow-x: scroll;
        }

        iframe {
            width: 100% !important;
        }

        #single-blog-post-content iframe {
            width: 100% !important;
            height: 80vh !important;
        }

        @media screen and (max-width: 500px) {
            #single-blog-post-content iframe {
                height: 50vh !important;
            }
        }

        /* Social share icons */
        .social-icons a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: #495057;
            color: #fff !important;
            border-radius: 100%;
            text-align: center;
            font-size: 1.5rem;
            line-height: 40px;
            margin-right: 1px;
        }

    </style>

@endpush

@section('frontend_content')

    <!-- Single Post section -->
    <section class="p-3 p-lg-5 d-flex align-items-center">
        <div class="w-100">
            <!-- search form -->
            @include('layouts.templates.frontend.search_form')

            <!-- Post -->
            <div class="single-blog-post-wrapper">
                <h4 class="text-normal text-bn mb-2"> {{ $blogPost->name }} </h4>
                <span class="small">
                    @if ($blogPost->BlogCategory)
                        <i class="fas fa-layer-group mr-1"></i> Category: <a
                            href="{{ route('frontend.blog.category', $blogPost->blogCategory->slug) }}"
                            class="font-weight-bold text-bn mr-2">{{ $blogPost->BlogCategory->name }}</a>
                    @endif
                    <i class="fas fa-calendar-alt mr-1"></i> Publish: <span
                        class="font-weight-bold">{{ $blogPost->created_at->format('F d, Y') }}</span>
                </span>

                {{-- post thumbnail --}}
                @if ($blogPost->image)
                    <img src="{{ asset('uploads/' . $blogPost->image) }}" alt="{{ $blogPost->name }}"
                        class="img img-thumbnail w-100 mt-1">
                @endif

                <!-- /.single-blog-post-content -->
                <div id="single-blog-post-content mt-1">
                    <p>{!! $blogPost->content !!}</p>
                </div>

                {{-- Social Share --}}
                @include('layouts.templates.share')

            </div>
            <!-- /.post -->

            {{-- leave a comment --}}
            {{-- <div>
                <h3 class="text-muted font-weight-bold mt-1">Leave a comment</h3>
            </div> --}}

            @if ($blogPosts->count() > 0)
                <!-- related posts -->
                <h2 class="my-3">Related Posts</h2>
                @include('layouts.templates.frontend.all_post')
            @endif

            {{-- Copy link modal --}}
            <div class="modal fade" id="copyLinkModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="copyLinkModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-flat btn-success" data-dismiss="modal"
                                onclick="copyPostLink()">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('frontend_scripts')

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
                toastr["success"]("Copied the link.");
            }, 1000);
        }
    </script>

@endpush
