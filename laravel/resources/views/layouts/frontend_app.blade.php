<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('frontend_meta_tags')

    @if (Request::is('/'))
        <meta name="google-site-verification"
            content="{{ $setting && $setting->google_verification_code ? $setting->google_verification_code : '' }}" />
        <meta name="msvalidate.01"
            content="{{ $setting && $setting->bing_verification_code ? $setting->bing_verification_code : '' }}" />
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/jpg"
        href="{{ $setting && $setting->app_logo ? asset('uploads/' . $setting->app_logo) : asset('static_uploads/abdulmajid.jpg') }}">

    <title>@yield('frontend_title', 'Web Developer') | {{ $setting ? $setting->app_name : config('app.name') }}
    </title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Solaiman Lipi Bangla font -->
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/resume.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/only_frontend.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{-- toastr js css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('frontend_styles')

</head>

<body id="page-top">

    <!-- left navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('frontend.home') }}">
            <span class="d-block d-lg-none"><img
                    src="{{ $setting && $setting->app_logo ? asset('uploads/' . $setting->app_logo) : asset('static_uploads/abdulmajid.jpg') }}"
                    class="rounded-circle" style="width: 35px;"><span class="ml-2">Abdul Majid</span></span>
            <span class="d-none d-lg-block">
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="{{ $setting && $setting->app_logo ? asset('uploads/' . $setting->app_logo) : asset('static_uploads/abdulmajid.jpg') }}"
                    alt="">
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item {{ Route::is('frontend.home') ? 'active' : '' }}">
                    <a class="nav-link js-scroll-trigger" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class="nav-item {{ Route::is('frontend.blog.*') ? 'active' : '' }}">
                    <a class="nav-link js-scroll-trigger" href="{{ route('frontend.blog.index') }}">Blog</a>
                </li>
            </ul>
        </div>
    </nav> <!-- end of left navbar -->

    <!-- main container -->
    <div class="container-fluid p-0 background">

        <section class="resume-section">
            @yield('frontend_content')
        </section>

        <hr class="m-0">

        <!-- footer section -->
        <footer class="mt-2">
            <div class="w-100 text-center p-3">
                <p> &copy; {{ date('Y') }} All Rights Reserved by
                    {{ $setting ? $setting->app_name : config('app.name') }}. </p>

            </div>
        </footer> <!-- end of footer section -->

    </div> <!-- end of main container -->

    <!-- jQuery and Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- fontawesome icon -->
    <script src="https://kit.fontawesome.com/71910267df.js" crossorigin="anonymous"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/resume.min.js') }}"></script>
    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // bootstrap title tooltip init
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        // search form topbar
        $(document).on("submit", "#search-form", function(e) {
            e.preventDefault()
            let searchValue = $('#search-value').val()

            if (searchValue != '') {
                let link = "{{ route('frontend.search', '') }}" + "/" + searchValue
                window.location.href = link;
            }

        });

        // toastr js config
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

    @stack('frontend_scripts')

</body>

</html>
