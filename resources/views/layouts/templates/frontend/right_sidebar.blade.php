  {{-- Search box --}}
  <div class="card card-primary card-outline">
    <div class="card-body">
      <!-- SEARCH FORM -->
      <form id="search-form">
        <div class="input-group input-group-sm">
          @if(isset($searchValue))
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="search-value" value="{{ $searchValue }}">
          @else
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="search-value">
          @endif
          
          <div class="input-group-append">
            <button class="btn btn-navbar bg-info" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Profile Image -->
  <div class="card card-primary card-outline">
      <div class="card-body box-profile">
      <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/static_uploads/abdulmajid.jpg') }}" alt="Abdul Majid">
      </div>

      <h3 class="profile-username text-center">Abdul Majid</h3>
      <p class="text-muted text-center">Web Developer</p>
      <a href="https://m.me/abdulmajidcse" class="btn btn-info btn-block"><b>Send a Message</b></a>
      <p class="mt-2">Hello! This is Abdul Majid. I am a web developer. I love to learn and share knowledge with others. This is my personal blog. I think this blog will be helpful. Thank you!</p>

      </div>
      <!-- /.card-body -->
  </div>
  <!-- /.card -->

  {{-- Recent Posts --}}
  <ul class="list-group">
    <li class="list-group-item bg-info font-weight-bold">Recent Posts</li>
    {{-- Blog Posts --}}
    @php
      $blogPosts = \App\Models\BlogPost::orderBy('id', 'desc')->limit(5)->get();
    @endphp
    @foreach ($blogPosts as $blogPost)
      <li class="list-group-item">
        <a href="{{ route('frontend.blog.post', $blogPost->slug) }}">{{ $blogPost->name }}</a>
      </li>
    @endforeach
  </ul>

  {{-- Categories --}}
  <ul class="list-group my-3">
    <li class="list-group-item bg-info font-weight-bold">Categories</li>
    {{-- Blog Category --}}
    @php
      $blogCategories = \App\Models\BlogCategory::orderBy('id', 'desc')->get();
    @endphp
    @foreach ($blogCategories as $blogCategory)
      <li class="list-group-item">
        <a href="{{ route('frontend.blog.category', $blogCategory->slug) }}">{{ $blogCategory->name }}</a>
      </li>
    @endforeach
    
  </ul>