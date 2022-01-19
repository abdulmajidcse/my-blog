<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/jpg"
        href="{{ $setting && $setting->app_logo ? $setting->app_logo : $noPreviewPhoto }}">

    <title>@yield('auth_title', config('app.name')) | {{ config('app.name') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Solaiman Lipi Bangla font -->
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary mb-1">
            <div class="card-header text-center">
                <a href="{{ route('frontend.home') }}">
                    <img src="{{ $setting && $setting->app_logo ? $setting->app_logo : $noPreviewPhoto }}"
                        alt="{{ $setting ? $setting->app_name : config('app.name') }}" width="50" height="50"
                        class="d-inline-block align-top img-circle">
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
