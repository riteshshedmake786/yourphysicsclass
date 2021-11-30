<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('physics/assets/img/favicon.png') }}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('physics/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('physics/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('physics/assets/css/base.css') }}">
    @if(Route::currentRouteName() == 'blogs')
    <link rel="stylesheet" href="{{ asset('physics/assets/css/slider.c') }}ss">
    <link rel="stylesheet" href="{{ asset('physics/assets/css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('physics/assets/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('physics/assets/css/slick-theme.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('physics/assets/css/slick.min.css') }}"/>
    @endif
    <title>{{ config('app.name') }}- @yield('title') </title>
  </head>
  <body>
    <!-- Header -->
    @include('website.elements.header') 

    @yield('content')
    <!-- Footer -->
    @include('website.elements.footer') 

    <!-- <script src="{{ asset('physics/assets/js/jquery-3.5.1.slim.min.js') }}" ></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('physics/assets/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    @if(Route::currentRouteName() == 'blogs')
    <script src="{{ asset('physics/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('physics/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('physics/assets/js/blog-custom.js') }}"></script>
    @endif
    @if(Route::currentRouteName() == 'index')
    <script src="{{ asset('physics/assets/js/custom.js') }}" ></script>
    @endif
    <script src="{{ asset('physics/assets/js/search.js') }}" ></script>
  </body>
</html>