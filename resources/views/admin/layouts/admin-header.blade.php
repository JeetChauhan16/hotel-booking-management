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
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="shortcut icon" href="{{url('backend/assets/images/favicon.png')}}" />

     @yield('styles')
</head>
<body>
    <div class="container-scroller">    

     <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{url('backend/assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{url('backend/assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{url('backend/assets/images/faces/face1.jpg')}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{ !empty(auth()->user()->name)?auth()->user()->name:'' }}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{route('logout')}}">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
        @include('admin/includes/admin-sidebar')
        @yield('content')

    </div>
    </div>
    <script src="{{url('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{url('backend/assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{url('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{url('backend/assets/js/misc.js')}}"></script>
    <script src="{{url('backend/assets/js/settings.js')}}"></script>
    <script src="{{url('backend/assets/js/todolist.js')}}"></script>
    <script src="{{url('backend/assets/js/jquery.cookie.js')}}"></script>
    <script src="{{url('backend/assets/js/dashboard.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('scripts')
</body>
</html>
