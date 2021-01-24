@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Create Category'}}
@endsection

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Category</h3>

          <div class="card-tools">
            <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-sm btn-primary">All Category</a>
          </div>
        </div>
        <div class="card-body">
          
          {{-- Create Category Form --}}
          <form role="form" action="{{ route('admin.blog-categories.store') }}" method="POST">
            @csrf
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

            <div class="form-group">
              <label for="seo_keyword">SEO Keyword</label>
              <textarea rows="4" class="form-control @error('seo_keyword') is-invalid @enderror" id="seo_keyword" name="seo_keyword">{{ old('seo_keyword') }}</textarea>
              @error('seo_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="seo_description">SEO Description</label>
              <textarea rows="8" class="form-control @error('seo_description') is-invalid @enderror" id="seo_description" name="seo_description">{{ old('seo_description') }}</textarea>
              @error('seo_description')
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