<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Resto-App') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Font Awesome -->
        <!-- overlayScrollbars -->
        <!-- Theme style -->
        @vite(['resources/css/all.min.css', 'resources/css/OverlayScrollbars.min.css', 'resources/css/adminlte.min.css'])

        
    </head>
    <body class="hold-transition sidebar-collapse layout-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                @include('navigation')

            <!-- Left navbar links -->
                 </nav>
            <!-- /.navbar -->
            
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                @yield('content')
                 <!-- /.content -->
                    </div>
                <!-- /.content-wrapper -->
            <footer class="main-footer">
            @include('footer')
            </footer>
        </div>
<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- overlayScrollbars -->
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
@vite(['resources/js/jquery.min.js', 'resources/js/bootstrap.bundle.min.js', 'resources/js/adminlte.min.js'])
    </body>
</html>
