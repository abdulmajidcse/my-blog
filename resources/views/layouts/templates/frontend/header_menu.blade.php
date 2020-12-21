{{-- Setting --}}
@php
    $setting = \App\Models\Setting::first();
@endphp  
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
    <div class="container">

      <a href="{{ route('frontend.home') }}" class="navbar-brand">
        <img src="{{ $setting ? asset('assets/uploads/'.$setting->app_logo) : asset('assets/static_uploads/abdulmajid.jpg') }}" alt="{{ $setting ? $setting->app_name : config('app.name') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> Menu
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('frontend.home') }}" class="nav-link">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a id="categoriesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Categories</a>
            <ul aria-labelledby="categoriesDropdown" class="dropdown-menu dropdown-menu-xl border-0 shadow">
              <li class="m-2 text-center">
                @php
                    $blogCategories = \App\Models\BlogCategory::orderBy('id', 'desc')->get();
                @endphp
                @if (count($blogCategories) > 0)
                  @foreach ($blogCategories as $blogCategory)
                    <a href="{{ route('frontend.blog.category', $blogCategory->slug) }}" class="btn btn-sm btn-flat btn-outline-primary mb-1">{{ $blogCategory->name }}</a>
                  @endforeach
                @else
                  <span class="btn btn-flat btn-outline-danger">No Category Available.</span>
                @endif
                 
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a id="contactDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Contact</a>
            <ul aria-labelledby="contactDropdown" class="dropdown-menu dropdown-menu-lg border-0 shadow">
              <li class="m-2 text-center">
                <a href="{{ $setting ? $setting->youtube_link : '#' }}" class="btn btn-sm btn-flat btn-outline-danger mb-1" title="YouTube">YouTube</a>
                <a href="{{ $setting ? $setting->facebook_link : '#' }}" class="btn btn-sm btn-flat btn-outline-primary mb-1" title="Facebook">Facebook</a>
                <a href="{{ $setting ? $setting->linkedin_link : '#' }}" class="btn btn-sm btn-flat btn-outline-info mb-1" title="LinkedIn">LinkedIn</a>
                <a href="{{ $setting ? $setting->github_link : '#' }}" class="btn btn-sm btn-flat btn-outline-dark mb-1" title="Github">Github</a>
                <a href="{{ $setting ? $setting->twitter_link : '#' }}" class="btn btn-sm btn-flat btn-outline-primary mb-1" title="Twitter">Twitter</a>
             </li>
            </ul>
          </li>

        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3" id="search-form">
          <div class="input-group input-group-sm">
            @if(isset($searchValue))
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="search-value" value="{{ $searchValue }}">
            @else
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="search-value">
            @endif
            
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->