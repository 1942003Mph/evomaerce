<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', env('APP_NAME'))</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
  integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminassets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminassets/dist/css/adminlte.min.css')}}">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @extends('admin.layout.sidbar')
    @extends('admin.layout.nav')
    @yield('content')
    @extends('admin.layout.footer')
</div>
    <script src="{{asset('adminassets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminassets/dist/js/adminlte.min.js')}}"></script>
@yield('scripts')

</body>
</html>