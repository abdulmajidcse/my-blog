@extends('layouts.admin_app')

@section('admin_title')
    {{ 'All Post'}}
@endsection

@push('admin_styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Post</h3>

          <div class="card-tools">
            <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-sm btn-primary">Create Post</a>
          </div>
        </div>
        <div class="card-body">
          
            {{-- All Post Table --}}
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Content</th>
                    <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogPosts as $blogPost)
                        <tr>
                            <td> {{ ++$loop->index }} </td>
                            <td> 
                                <div class="magnific_image_container">
                                    <a href="{{ asset('assets/uploads/'.$blogPost->image) }}"><img src="{{ asset('assets/uploads/'.$blogPost->image) }}" alt="Thumbnail" class="img w-100"></a>
                                </div>
                            </td>
                            <td> {{ optional($blogPost->blogCategory)->name }} </td>
                            <td> {{ $blogPost->name }} </td>
                            <td> {{ $blogPost->slug }} </td>
                            <td> {!! Str::words($blogPost->content, 65) !!} </td>
                            <td>
                                <div class="dropdown">

                                    <!-- Action button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.blog-posts.edit', $blogPost) }}"><i class="fas fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" id="destroy" href="{{ route('admin.blog-posts.destroy', $blogPost) }}"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{-- Delete form will add here --}}
            <div id="add-destroy-form" class="d-none">
                
            </div>

        </div>
        <!-- /.card-body -->
    </div>

@endsection

@push('admin_scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- page script -->
    <script>
        $('#dataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>

@endpush