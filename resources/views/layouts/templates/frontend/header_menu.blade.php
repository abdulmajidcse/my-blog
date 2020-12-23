{{-- Setting --}}
@php
    $setting = \App\Models\Setting::first();
@endphp  
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg navbar-dark navbar-primary">
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

          {{-- Blog Category --}}
          @php
              $blogCategories = \App\Models\BlogCategory::orderBy('id', 'desc')->limit(3)->get();
          @endphp
          @foreach ($blogCategories as $blogCategory)
            <li class="nav-item">
              <a href="{{ route('frontend.blog.category', $blogCategory->slug) }}" class="nav-link">{{ $blogCategory->name }}</a>
            </li>
          @endforeach

        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-lg-3" id="search-form">
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