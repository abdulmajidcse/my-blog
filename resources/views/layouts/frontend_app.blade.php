
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ 'Home | ' . config('app.name') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

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
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-12 text-muted">
              <h1>A Bengali Blog about ICT</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
          <div class="row">
            
            {{-- Blog post start from here --}}
            <div class="col-md-9">
              <div class="card">
                <div class="card-body">

                  @yield('blog_content')
                  
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

            <div class="col-md-3">
  
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/static_uploads/abdulmajid.jpg') }}" alt="Abdul Majid">
                    </div>
    
                    <h3 class="profile-username text-center">Abdul Majid</h3>
    
                    <p class="text-muted text-center">Web Developer</p>
    
                    <a href="https://m.me/abdulmajidcse" target="__blank" class="btn btn-primary btn-block"><b>Send a Message</b></a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
                <!-- About Me Box -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>
    
                    <p class="text-muted">
                      Diploma in Computer Technology from Kurigram Polytechnic Institute
                    </p>
    
                    <hr>
    
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
    
                    <p class="text-muted">Bangladesh</p>
    
                    <hr>
    
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
    
                    <p>
                      <span class="badge badge-pill badge-primary">HTML</span>
                      <span class="badge badge-pill badge-primary">CSS</span>
                      <span class="badge badge-pill badge-primary">Javascript</span>
                      <span class="badge badge-pill badge-primary">JQuery</span>
                      <span class="badge badge-pill badge-primary">Bootstrap</span>
                      <span class="badge badge-pill badge-primary">Vuejs</span>
                      <span class="badge badge-pill badge-primary">PHP</span>
                      <span class="badge badge-pill badge-primary">MySQL</span>
                      <span class="badge badge-pill badge-primary">WordPress</span>
                      <span class="badge badge-pill badge-primary">Laravel</span>
                    </p>
    
                    <hr>
    
                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
    
                    <p class="text-muted">Hello! This is Abdul Majid. I am a web developer. I love to learn and share knowledge with others. This is my personal blog. I think this blog will be helpful. Thank you!</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Github | Contact Me
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date('Y') }} <a href="https://facebook.com/abdulmajidcse" target="__blank">Abdul Majid</a>.</strong> All rights reserved.
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>