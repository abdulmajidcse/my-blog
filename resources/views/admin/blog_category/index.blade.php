@extends('layouts.admin_app')

@section('admin_title')
    {{ 'All Category'}}
@endsection

@push('admin_styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Category</h3>

          <div class="card-tools">
            <a href="{{ route('admin.blog.categories.create') }}" class="btn btn-sm btn-primary">Create Category</a>
          </div>
        </div>
        <div class="card-body">
          
            {{-- All Category Table --}}
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogCategories as $blogCategory)
                        <tr>
                            <td> {{ ++$loop->index }} </td>
                            <td> {{ $blogCategory->name }} </td>
                            <td> {{ $blogCategory->slug }} </td>
                            <td>
                                edit
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            

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
            "autoWidth": true,
            "responsive": true,
        });
    </script>

@endpush