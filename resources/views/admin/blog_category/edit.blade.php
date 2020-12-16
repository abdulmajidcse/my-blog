@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Edit Category'}}
@endsection

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Category</h3>

          <div class="card-tools">
            <a href="{{ route('admin.blog.categories.index') }}" class="btn btn-sm btn-primary">All Category</a>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
    </div>

@endsection