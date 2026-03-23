<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.head')
    </head>
    
    @yield('style')

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('admin.layouts.header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            @include('admin.layouts.footer')

            <!-- Control Sidebar -->
            @include('admin.layouts.control-sidebar')
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        @include('admin.layouts.foot')

        <script src="{{ mix('build/js/app.js') }}"></script>

        @yield('script')
    </body>
</html>