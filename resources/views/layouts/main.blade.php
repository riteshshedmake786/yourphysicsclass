<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Your Physics Class') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ asset('physics/assets/img/favicon.png') }}">
        <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg authentication-bg-pattern">
        @yield('content')
        <footer class="footer footer-alt">
            {{ date('Y') }} &copy; Your Physics Class
        </footer>
        <script src="{{ asset('dashboard/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
    </body>
</html>