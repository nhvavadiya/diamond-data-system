<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>AdSudani</title>
        <link rel="stylesheet" href="{{ URL::to('resources/views/templates/AdminLTE/vendors/ti-icons/css/themify-icons.css') }}">
        {{-- <link rel="stylesheet" href="{{ URL::to('resources/views/templates/AdminLTE/vendors/css/vendor.bundle.base.css') }}"> --}}
        <link rel="stylesheet" href="{{ URL::to('resources/views/templates/AdminLTE/css/vertical-layout-light/style.css') }}">
        <link rel="stylesheet" href="{{ URL::to('resources/views/templates/AdminLTE/css/vertical-layout-light/purchas.css') }}">
        <link rel="shortcut icon" href="{{ URL::to('resources/views/templates/AdminLTE/images/favicon.png') }}" />
        <link rel="stylesheet" href="{{ URL::to('resources/views/templates/AdminLTE/vendors/mdi/css/materialdesignicons.min.css')}}">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" /> --}}
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        {{-- confirm.css --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

        <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert/css/sweetalert.css')}}"/>
        {{-- https://bootsnipp.com/snippets/lV88M --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

        {{-- custom css --}}
        <link href="{{ URL::to('public/css/custom.css') }}" rel="stylesheet">
        <link href="{{ URL::to('public/css/custom1.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container-scroller">
            
         
            @include('templates.header')
            @include('templates.sidebar')
        </div>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/js/off-canvas.js') }}"></script>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/js/hoverable-collapse.js') }}"></script>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/js/template.js') }}"></script>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/js/settings.js') }}"></script>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/js/todolist.js') }}"></script>
        <script src="{{ URL::to('resources/views/templates/AdminLTE/js/dashboard.js') }}"></script>
        <script src="{{asset('assets/vendors/sweetalert/js/sweetalert.min.js')}}"></script>
      

        {{-- date picker --}}
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> --}}
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

        {{-- daterange picker --}}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        {{-- confirm.js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

        {{-- datatable  --}}
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        @yield('script')
    </body>
</html>
