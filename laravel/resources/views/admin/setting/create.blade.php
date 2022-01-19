@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Setting' }}
@endsection

@section('admin_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Setting</h3>
        </div>
        <div class="card-body">

            {{-- Setting Form --}}
            <form role="form" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="app_name">App Name *</label>
                    <input type="text" class="form-control @error('app_name') is-invalid @enderror" id="app_name"
                        name="app_name" value="{{ old('app_name') }}" required>
                    @error('app_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="app_title">App Title *</label>
                    <input type="text" class="form-control @error('app_title') is-invalid @enderror" id="app_title"
                        name="app_title" value="{{ old('app_title') }}" required>
                    @error('app_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="app_description">App Description</label>
                    <textarea type="text" class="editor form-control @error('app_description') is-invalid @enderror"
                        id="app_description" name="app_description" rows="5">{{ old('app_description') }}</textarea>
                    @error('app_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="app_logo">App Logo</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="app_logo_lfm" data-input="app_logo" data-preview="app_logo_preview"
                                class="btn btn-primary text-white">
                                <i class="fas fa-image"></i> Choose
                            </a>
                        </span>
                        <input readonly type="text" name="app_logo" id="app_logo"
                            class="form-control @error('app_logo') is-invalid @enderror" />
                    </div>
                    @error('app_logo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div id="app_logo_preview" class="mt-2" style="width: 5rem;">
                        <img src="{{ $noPreviewPhoto }}" alt="No Preview" class="img w-100">
                    </div>
                </div>

                <div class="form-group">
                    <label for="facebook_link">Facebook Link</label>
                    <input type="url" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link"
                        name="facebook_link" value="{{ old('facebook_link') }}">
                    @error('facebook_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="youtube_link">YouTube Link</label>
                    <input type="url" class="form-control @error('youtube_link') is-invalid @enderror" id="youtube_link"
                        name="youtube_link" value="{{ old('youtube_link') }}">
                    @error('youtube_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="linkedin_link">LinkedIn Link</label>
                    <input type="url" class="form-control @error('linkedin_link') is-invalid @enderror" id="linkedin_link"
                        name="linkedin_link" value="{{ old('linkedin_link') }}">
                    @error('linkedin_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="github_link">Github Link</label>
                    <input type="url" class="form-control @error('github_link') is-invalid @enderror" id="github_link"
                        name="github_link" value="{{ old('github_link') }}">
                    @error('github_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="twitter_link">Twitter Link</label>
                    <input type="url" class="form-control @error('twitter_link') is-invalid @enderror" id="twitter_link"
                        name="twitter_link" value="{{ old('twitter_link') }}">
                    @error('twitter_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="google_verification_code">Google verification code</label>
                    <input type="text" class="form-control @error('google_verification_code') is-invalid @enderror"
                        id="google_verification_code" name="google_verification_code"
                        value="{{ old('google_verification_code') }}">
                    <p>Get your Google verification code in <a target="_blank"
                            href="https://www.google.com/webmasters/verification/verification?hl=en&tid=alternate&siteUrl={{ url('/') }}"
                            rel="noopener noreferrer">Google Search Console</a>.</p>
                    @error('google_verification_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bing_verification_code">Bing verification code</label>
                    <input type="text" class="form-control @error('bing_verification_code') is-invalid @enderror"
                        id="bing_verification_code" name="bing_verification_code"
                        value="{{ old('bing_verification_code') }}">
                    <p>Get your Bing verification code in <a target="_blank"
                            href="https://www.bing.com/toolbox/webmaster/#/Dashboard/?url={{ url('/') }}"
                            rel="noopener noreferrer">Bing Webmaster Tools</a>.</p>
                    @error('bing_verification_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="seo_keyword">SEO Keyword</label>
                    <textarea rows="4" class="form-control @error('seo_keyword') is-invalid @enderror" id="seo_keyword"
                        name="seo_keyword"
                        placeholder="example: laravel, reactjs, mysql">{{ old('seo_keyword') }}</textarea>
                    @error('seo_keyword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="seo_description">SEO Description</label>
                    <textarea rows="4" class="form-control @error('seo_description') is-invalid @enderror"
                        id="seo_description" name="seo_description">{{ old('seo_description') }}</textarea>
                    @error('seo_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="seo_image">SEO Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="seo_image_lfm" data-input="seo_image" data-preview="seo_image_preview"
                                class="btn btn-primary text-white">
                                <i class="fas fa-image"></i> Choose
                            </a>
                        </span>
                        <input readonly type="text" name="seo_image" id="seo_image"
                            class="form-control @error('seo_image') is-invalid @enderror" />
                    </div>
                    @error('seo_image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div id="seo_image_preview" class="mt-2" style="width: 5rem;">
                        <img src="{{ $noPreviewPhoto }}" alt="No Preview" class="img w-100">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>

        </div>
        <!-- /.card-body -->

    </div>

@endsection

@push('admin_scripts')
    <script>
        $('#seo_image_lfm').filemanager('image');
        $('#app_logo_lfm').filemanager('image');
    </script>
@endpush
