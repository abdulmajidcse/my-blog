
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @yield('frontend_meta_tags')

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/jpg" href="{{ asset('assets/static_uploads/abdulmajid.jpg') }}">

  <title>@yield('frontend_title', 'Web Developer') | {{ config('app.name') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Magnific Popup core CSS file -->
  <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
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
  <footer class="main-footer bg-dark">
    <div class="container">
        <!-- To the right -->
        <div class="float-md-right font-weight-bold text-white">
          <a href="https://www.youtube.com/channel/UC74l6d0jcefsx0JvHvW4K2Q" class="text-white">YouTube</a> | <a href="https://facebook.com/abdulmajidcse" class="text-white">Facebook</a> | <a href="https://www.linkedin.com/in/abdulmajidcse" class="text-white">LinkedIn</a> | <a href="https://github.com/abdulmajidcse" class="text-white">Github</a>
        </div>
        <!-- Default to the left -->
        <span>Copyright &copy; 2020 <a href="https://facebook.com/abdulmajidcse" class="text-white font-weight-bold border-bottom">Abdul Majid</a>. All rights reserved.</span>
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
<!-- Magnific Popup core JS file -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

<script>

  $('.magnific_image_container').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{
        enabled: true
    }
  })

  // search form
  $(document).on("submit", "#search-form", function(e){
    e.preventDefault()
    let searchValue = $('#search-value').val()
    let link = "{{ route('frontend.search', '') }}" + "/" + searchValue 

    window.location.href = link;

  })

</script>

@stack('frontend_scripts')

</body>
</html>