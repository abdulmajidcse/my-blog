@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Create Post'}}
@endsection

@push('admin_styles')
    <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
@endpush

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Post</h3>

          <div class="card-tools">
            <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-sm btn-primary">All Post</a>
          </div>
        </div>
        <div class="card-body">
          
          {{-- Create Post Form --}}
          <form role="form" action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="image">Thumbnail Image</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="blog_category_id">Post Category *</label>
              <select name="blog_category_id" id="blog_category_id" class="form-control @error('blog_category_id') is-invalid @enderror" required>
                <option value="" disabled selected>Select a post category</option>
                @foreach ($blogCategories as $blogCategory)
                  <option value="{{ $blogCategory->id }}" {{ old('blog_category_id') == $blogCategory->id ? 'selected' : '' }}>{{ $blogCategory->name }}</option>
                @endforeach
              </select>
              @error('blog_category_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="slug">Slug *</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
              @error('slug')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            {{-- post content. main post body --}}
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Post Content *
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body pad">
                  <textarea name="content" class="post-content form-control @error('content') is-invalid @enderror" placeholder="What's on your mind?" required>
                    {{ old('content') }}
                  </textarea>
                  @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="meta_keyword">Meta Keyword *</label>
              <textarea rows="4" class="form-control @error('meta_keyword') is-invalid @enderror" id="meta_keyword" name="meta_keyword" required>{{ old('meta_keyword') }}</textarea>
              @error('meta_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="meta_description">Meta Description *</label>
              <textarea rows="8" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" required>{{ old('meta_description') }}</textarea>
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

@push('admin_scripts')
  <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          bsCustomFileInput.init();
      })

      $(function () {
        // Summernote
        $('.post-content').summernote()
      })
  </script>
@endpush