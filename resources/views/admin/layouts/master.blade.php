<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.head')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('admin.layouts.nav')
     @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
 @include('admin.layouts.alerts.success') 
 @include('admin.layouts.alerts.error')
     @yield('content')

     @include('admin.layouts.footer')
</div>
</body>
</html>
