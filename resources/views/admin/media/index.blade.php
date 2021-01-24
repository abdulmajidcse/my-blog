@extends('layouts.admin_app')

@section('admin_title')
    {{ 'All Media'}}
@endsection

@push('admin_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

<style>
    .magnific_image_container img {
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
        transition: .3s;
        -webkit-transition: .3s;
        -moz-transition: .3s;
    }
    .magnific_image_container img:hover{
        transform: scale(0.97);
        -webkit-transform: scale(0.97);
        -moz-transform: scale(0.97);
        -o-transform: scale(0.97);
        opacity: 0.75;
        -webkit-opacity: 0.75;
        -moz-opacity: 0.75;
        transition: .3s;
        -webkit-transition: .3s;
        -moz-transition: .3s;
    }
    </style>
    
@endpush

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Media</h3>

          <div class="card-tools">
            <a href="{{ route('admin.media.create') }}" class="btn btn-flat btn-sm btn-primary">Create Media</a>
          </div>
        </div>
        <div class="card-body">
          
            {{-- all media --}}
            <div class="row">
                @foreach ($allMedia as $media)
                    <div class="col-sm-4 col-md-3">
                        <div class="mb-3">
                            <div class="magnific_image_container">
                                <a href="{{ asset('assets/uploads/'.$media->name) }}"><img src="{{ asset('assets/uploads/'.$media->name) }}" class="img w-100" alt="Media"></a>
                            </div>
                            <input id="copyLinkValue{{ $media->id }}" type="text" value="{{ asset('assets/uploads/'.$media->name) }}" class="form-control form-control-sm">

                            <div class="m-1">
                                <button onclick="copyPostLink({{ $media->id }})" class="btn btn-sm btn-flat btn-success"><i class="fas fa-link"></i> Copy</button>
                                <a class="btn btn-sm btn-flat btn-danger" id="destroy" href="{{ route('admin.media.destroy', $media) }}"><i class="fas fa-trash-alt"></i> Delete</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            
            
            {{-- See More --}}
            <div class="float-right">
                {{ $allMedia->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
        <!-- /.card-body -->

    </div>

    {{-- Delete form will add here --}}
    <div id="add-destroy-form" class="d-none">
                
    </div>

@endsection

@push('admin_scripts')
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script>

        // Magnific Image Init
        $('.magnific_image_container').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery:{
                enabled: true
            }
        });

        function copyPostLink(id) {
            /* Get the text field */
            let copylink = document.getElementById("copyLinkValue"+id);

            /* Select the text field */
            copylink.select();
            copylink.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            Swal.fire({
                icon: 'success',
                text: 'Copied the link.',
            })
        }

    </script>
@endpush