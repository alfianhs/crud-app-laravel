<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @stack('aditional-css')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @yield('preloader')
        @include('pian-app.navbar')
        @include('pian-app.aside')
        @yield('content')
        @include('pian-app.footer')
    </div>    

    @stack('aditional-js')
</body>
</html>