<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ asset('physics/assets/img/favicon.png') }}">
        @if(Route::currentRouteName() == 'contact-list' || Route::currentRouteName() == 'course')
        <link href="{{ asset('dashboard/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        @endif
        <link href="{{ asset('dashboard/assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    </head>
    <body>

        @include('dashboard.elements.header')
        <div class="wrapper">
        @yield('content')
        </div>
        @include('dashboard.elements.footer')

        <div class="rightbar-overlay"></div>
        <script src="{{ asset('dashboard/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        @if(Route::currentRouteName() == 'contact-list' || Route::currentRouteName() == 'course')
        <script src="{{ asset('dashboard/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/datatables.init.js') }}"></script>
        @endif
        <script src="{{ asset('dashboard/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/lightbox.init.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/dashboard-2.init.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @include('dashboard.elements.notification')
    </body>
</html>