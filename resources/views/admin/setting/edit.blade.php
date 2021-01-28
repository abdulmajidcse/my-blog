@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Setting'}}
@endsection

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Setting</h3>
        </div>
        <div class="card-body">
          
          {{-- Setting Form --}}
          <form role="form" action="{{ route('admin.settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            <div class="form-group">
              <label for="app_name">App Name *</label>
              <input type="text" class="form-control @error('app_name') is-invalid @enderror" id="app_name" name="app_name" value="{{ $setting->app_name }}" required>
              @error('app_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="app_title">App Title *</label>
              <input type="text" class="form-control @error('app_title') is-invalid @enderror" id="app_title" name="app_title" value="{{ $setting->app_title }}" required>
              @error('app_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="app_logo">App Logo</label>
              <input type="file" class="form-control @error('app_logo') is-invalid @enderror" id="app_logo" name="app_logo">
              @error('app_logo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              @if ($setting->app_logo)
                <div class="mt-2" style="width: 200px;">
                  <img src="{{ asset('assets/uploads/'.$setting->app_logo) }}" alt="App Logo" class="img w-100">
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="facebook_link">Facebook Link</label>
              <input type="url" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link" name="facebook_link" value="{{ $setting->facebook_link }}">
              @error('facebook_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="youtube_link">YouTube Link</label>
              <input type="url" class="form-control @error('youtube_link') is-invalid @enderror" id="youtube_link" name="youtube_link" value="{{ $setting->youtube_link }}">
              @error('youtube_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="linkedin_link">LinkedIn Link</label>
              <input type="url" class="form-control @error('linkedin_link') is-invalid @enderror" id="linkedin_link" name="linkedin_link" value="{{ $setting->linkedin_link }}">
              @error('linkedin_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="github_link">Github Link</label>
              <input type="url" class="form-control @error('github_link') is-invalid @enderror" id="github_link" name="github_link" value="{{ $setting->github_link }}">
              @error('github_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="twitter_link">Twitter Link</label>
              <input type="url" class="form-control @error('twitter_link') is-invalid @enderror" id="twitter_link" name="twitter_link" value="{{ $setting->twitter_link }}">
              @error('twitter_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="seo_keyword">SEO Keyword</label>
              <textarea rows="4" class="form-control @error('seo_keyword') is-invalid @enderror" id="seo_keyword" name="seo_keyword">{{ $setting->seo_keyword }}</textarea>
              @error('seo_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="seo_description">SEO Description</label>
              <textarea rows="4" class="form-control @error('seo_description') is-invalid @enderror" id="seo_description" name="seo_description">{{ $setting->seo_description }}</textarea>
              @error('seo_description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="seo_image">SEO Image</label>
              <input type="file" class="form-control @error('seo_image') is-invalid @enderror" id="seo_image" name="seo_image">
              @error('seo_image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              @if ($setting->seo_image)
                <div class="mt-2" style="width: 200px;">
                  <img src="{{ asset('assets/uploads/'.$setting->seo_image) }}" alt="seo Image" class="img w-100">
                </div>
              @endif
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

          </form>

        </div>
        <!-- /.card-body -->

    </div>

@endsection