
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @yield('frontend_meta_tags')

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('frontend_title', 'Web Developer') | {{ config('app.name') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @stack('frontend_styles')

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  @include('layouts.templates.frontend.header_menu')

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
            <div class="col-md-7 col-lg-8">
              <div class="card">
                <div class="card-body">

                  @yield('blog_content')
                  
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

            <div class="col-md-5 col-lg-4">
  
              @include('layouts.templates.frontend.right_sidebar')

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
        <div class="float-md-right font-weight-bold">
          <a href="#">YouTube</a> | <a href="#">Facebook</a> | <a href="#">LinkedIn</a> | <a href="#">Github</a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 <a href="https://facebook.com/abdulmajidcse">Abdul Majid</a>.</strong> All rights reserved.
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

@stack('frontend_scripts')

</body>
</html>