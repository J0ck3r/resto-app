<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'resto-app') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Font Awesome -->
        <!-- overlayScrollbars -->
        <!-- Theme style -->
        @vite(['resources/css/app.css', 'resources/css/all.min.css', 'resources/css/OverlayScrollbars.min.css', 'resources/css/adminlte.min.css'])
        
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
           <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    @include('admin.navigation')
            <!-- Left navbar links -->
                </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
                <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
                    @include('admin.sidebar')
            <!-- /.sidebar -->
                </aside>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    @if (session()->has('danger'))
                    <div class="p-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">Danger </span>{{ session()->get('danger') }}
                    </div>
                    @endif
                    @if (session()->has('warning'))
                    <div class="p-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
                        <span class="font-medium">Warning </span>{{ session()->get('warning') }}
                    </div>
                    @endif
                    @if (session()->has('success'))
                    <div class="p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <span class="font-medium">Success </span>{{ session()->get('success') }}
                    </div>
                    @endif
                    
                    <!-- Content Header (Page header) -->
                    @yield('content')
                 <!-- /.content -->
                    </div>
                <!-- /.content-wrapper -->
            <footer class="main-footer">
                    @include('admin.footer')
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
