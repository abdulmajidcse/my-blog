{{-- Setting --}}
@php
    $setting = \App\Models\Setting::first();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/jpg" href="{{ $setting ? asset('assets/uploads/'.$setting->app_logo) : asset('assets/static_uploads/abdulmajid.jpg') }}">

  <title>@yield('admin_title', 'Web Developer') | {{ $setting ? $setting->app_name : config('app.name') }}</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Magnific Popup core CSS file -->
  <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
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
        <a href="{{ route('frontend.home') }}" class="nav-link">Visite Site</a>
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
            <h1>{{ $setting ? $setting->app_title : 'Set Your Application Title Here' }}</h1>
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

  <footer class="main-footer bg-dark">
    <div class="container">
      <!-- To the right -->
      <div class="float-md-right font-weight-bold text-white">
        <a href="{{ $setting ? $setting->youtube_link : '#' }}" class="text-white" title="YouTube">YouTube</a> | 
        <a href="{{ $setting ? $setting->facebook_link : '#' }}" class="text-white" title="Facebook">Facebook</a> | 
        <a href="{{ $setting ? $setting->linkedin_link : '#' }}" class="text-white" title="LinkedIn">LinkedIn</a> | 
        <a href="{{ $setting ? $setting->github_link : '#' }}" class="text-white" title="Github">Github</a> | 
        <a href="{{ $setting ? $setting->twitter_link : '#' }}" class="text-white" title="Twitter">Twitter</a>
      </div>
      <!-- Default to the left -->
      <span class="font-weight-bold">2020 &copy; Developed By <a href="https://facebook.com/abdulmajidcse" class="text-white border-bottom">Abdul Majid</a>.</span>
    </div>
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
<script src="{{ asset('assets/js/sweetalert2010.min.js') }}"></script>

<!-- Magnific Popup core JS file -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // name to slug convert
    $('#name').change(function() {
      
      let slug = $('#name').val()
      $.ajax({
        method: "POST",
        url: "{{ route('admin.slug.create') }}",
        data: { name: slug }
      })
      .done((success) => {
        $('#slug').val(success.slug)
      })
      .fail((error) => {
        Swal.fire({
          icon: 'error',
          text: 'Name to slug convert failed!',
        })
      })

    })

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

  })

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

  })

  $('.magnific_image_container').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{
        enabled: true
    }
  })

</script>

@stack('admin_scripts')

</body>
</html>
