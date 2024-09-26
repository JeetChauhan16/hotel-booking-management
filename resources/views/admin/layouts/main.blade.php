<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    
    <link rel="stylesheet" href="{{url('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/css/custom.css')}}">
    <link rel="shortcut icon" href="{{url('backend/assets/images/favicon.png')}}" />

     @yield('styles')
</head>
<body>
    @yield('content')

    <script src="{{url('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{url('backend/assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{url('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{url('backend/assets/js/misc.js')}}"></script>
    <script src="{{url('backend/assets/js/settings.js')}}"></script>
    <script src="{{url('backend/assets/js/todolist.js')}}"></script>
    <script src="{{url('backend/assets/js/jquery.cookie.js')}}"></script>
    <script src="{{url('backend/assets/js/dashboard.js')}}"></script>
    @yield('scripts')
</body>
</html>
