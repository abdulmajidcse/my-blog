  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
    <div class="container">

      <a href="{{ route('frontend.home') }}" class="navbar-brand">
        <img src="{{ asset('assets/static_uploads/abdulmajid.jpg') }}" alt="Abdul Majid" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          <li class="nav-item">
            <a href="#" class="nav-link">Blog</a>
          </li>

          <li class="nav-item dropdown">
            <a id="categoriesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Categories</a>
            <ul aria-labelledby="categoriesDropdown" class="dropdown-menu dropdown-menu-xl border-0 shadow">
              <li class="m-2 text-center">
                 <a href="#" class="btn btn-sm btn-primary mb-1">PHP</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">Problem Solving</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">HTML</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">CSS</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">PHP</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">Problem Solving</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">HTML</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">CSS</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">PHP</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">Problem Solving</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">HTML</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">CSS</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">PHP</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">Problem Solving</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">HTML</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">CSS</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">PHP</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">Problem Solving</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">HTML</a>
                 <a href="#" class="btn btn-sm btn-primary mb-1">CSS</a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a id="contactDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Contact</a>
            <ul aria-labelledby="contactDropdown" class="dropdown-menu border-0 shadow">
              <li class="m-2 text-center">
                <a href="#" class="btn btn-sm btn-primary mb-1">YouTube</a>
                <a href="#" class="btn btn-sm btn-primary mb-1">Facebook</a>
                <a href="#" class="btn btn-sm btn-primary mb-1">LinkedIn</a>
                <a href="#" class="btn btn-sm btn-primary mb-1">Github</a>
             </li>
            </ul>
          </li>

        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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