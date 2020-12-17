@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Edit Category'}}
@endsection

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Category</h3>

          <div class="card-tools">
            <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-sm btn-primary">All Category</a>
          </div>
        </div>
        <div class="card-body">
          
          {{-- Edit Category Form --}}
          <form role="form" action="{{ route('admin.blog-categories.update', $blogCategory) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $blogCategory->name }}" required>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="slug">Slug *</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $blogCategory->slug }}" required>
              @error('slug')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="meta_keyword">Meta Keyword *</label>
              <textarea rows="4" class="form-control @error('meta_keyword') is-invalid @enderror" id="meta_keyword" name="meta_keyword" required>{{ $blogCategory->meta_keyword }}</textarea>
              @error('meta_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="meta_description">Meta Description *</label>
              <textarea rows="8" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" required>{{ $blogCategory->meta_description }}</textarea>
              @error('meta_description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

          </form>

        </div>
        <!-- /.card-body -->

    </div>

@endsection