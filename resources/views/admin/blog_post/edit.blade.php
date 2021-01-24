@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Edit Post'}}
@endsection

@push('admin_styles')
    <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
@endpush

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Post</h3>

          <div class="card-tools">
            <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-sm btn-primary">All Post</a>
          </div>
        </div>
        <div class="card-body">
          
          {{-- Edit Post Form --}}
          <form role="form" action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
              <label for="image">Thumbnail Image</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              @if ($blogPost->image)
                <div class="magnific_image_container mt-2" style="width: 200px;">
                  <a href="{{ asset('assets/uploads/'.$blogPost->image) }}"><img src="{{ asset('assets/uploads/'.$blogPost->image) }}" alt="Thumbnail" class="img w-100"></a>
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="blog_category_id">Post Category *</label>
              <select name="blog_category_id" id="blog_category_id" class="form-control @error('blog_category_id') is-invalid @enderror" required>
                <option value="" disabled selected>Select a post category</option>
                @foreach ($blogCategories as $blogCategory)
                  <option value="{{ $blogCategory->id }}" {{ $blogPost->blog_category_id == $blogCategory->id ? 'selected' : '' }}>{{ $blogCategory->name }}</option>
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
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $blogPost->name }}" required>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="slug">Slug *</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $blogPost->slug }}" required>
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
                    {{ $blogPost->content }}
                  </textarea>
                  @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="seo_keyword">SEO Keyword</label>
              <textarea rows="4" class="form-control @error('seo_keyword') is-invalid @enderror" id="seo_keyword" name="seo_keyword">{{ $blogPost->seo_keyword }}</textarea>
              @error('seo_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="seo_description">SEO Description</label>
              <textarea rows="8" class="form-control @error('seo_description') is-invalid @enderror" id="seo_description" name="seo_description">{{ $blogPost->seo_description }}</textarea>
              @error('seo_description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="icheck-primary">
                <input type="checkbox" name="save_as_draft" id="save_as_draft" {{ old('save_as_draft') ? 'checked' : ($blogPost->status == 2 ? 'checked' : '') }}>
                <label for="save_as_draft" class="text-danger">Save As Draft</label>
              </div>
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