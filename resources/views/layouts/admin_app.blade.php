<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/jpg" href="{{ asset('assets/static_uploads/abdulmajid.jpg') }}">

  <title>@yield('admin_title', 'Web Developer') | {{ config('app.name') }}</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @stack('admin_styles')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('frontend.home') }}" class="nav-link">Frontend</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Profile Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  @include('layouts.templates.admin.left_sidebar_menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    {{-- card-header --}}
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-12 text-muted">
            <h1>A Bengali Blog about ICT</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('admin_content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-md-right font-weight-bold">
      <a href="#">YouTube</a> | <a href="#">Facebook</a> | <a href="#">LinkedIn</a> | <a href="#">Github</a>
    </div>
    <strong>Copyright &copy; 2020 <a href="https://facebook.com/abdulmajidcse">Abdul Majid</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

  // action message
  @if(Session::has('message') AND Session::has('alert-type'))
    Swal.fire({
      icon: "{{ Session::get('alert-type') }}",
      text: "{{ Session::get('message') }}",
    })
  @endif

  //return delete confirm message**********
  $(document).on("click", "#destroy", function(e){
      e.preventDefault()

      let link = $(this).attr("href");

      Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#add-destroy-form').html(`
            <form id="destroy-form" action="${link}" method="POST">
                @csrf
                @method('delete')
            </form>
          `)
          document.getElementById('destroy-form').submit()
        } else {
          Swal.fire({
            icon: 'success',
            text: 'Canceled!',
          })
        }
      })

  });

  //return confirm message**********
  $(document).on("click", "#confirm", function(e){
      e.preventDefault();
      let link = $(this).attr("href");

      Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link;
        } else {
          Swal.fire({
            icon: 'success',
            text: 'Canceled!',
          })
        }
      })

  });

</script>

@stack('admin_scripts')

</body>
</html>
