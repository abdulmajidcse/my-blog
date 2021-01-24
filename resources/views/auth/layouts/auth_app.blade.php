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

  <link rel="icon" type="image/jpg" href="{{ asset('assets/static_uploads/abdulmajid.jpg') }}">

  <title>@yield('auth_title', config('app.name')) | {{ config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <style>
    input, textarea, button, .btn {
      border-radius: 0px !important;
    }
  </style>

</head>
<body class="hold-transition login-page">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary mb-1">
      <div class="card-header text-center">
        <a href="{{ route('frontend.home') }}">
          <img src="{{ $setting ? asset('assets/uploads/'.$setting->app_logo) : asset('assets/static_uploads/abdulmajid.jpg') }}" alt="{{ $setting ? $setting->app_name : config('app.name') }}" width="50" height="50" class="d-inline-block align-top img-circle">
          <span class="h1 font-weight-bold">{{ $setting ? $setting->app_name : config('app.name') }}</span>
        </a>
      </div>
      <div class="card-body">
        @yield('auth_content')
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

</body>
</html>