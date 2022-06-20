<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Api Document App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Api Document">
    <meta itemprop="description" content="Api Document">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://api-document.maoleng.dev">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Api Document App">
    <meta property="og:image" content="{{asset('assets/img/meta-image.jpg')}}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content="Api Document App">
    <meta name="twitter:image" content="{{asset('assets/img/meta-image.jpg')}}">
    <meta name="twitter:card" content="{{asset('assets/img/meta-image.jpg')}}">

    <meta content="App" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />


    @yield('more_style')
</head>



<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

<!-- Pre-loader -->
<div id="preloader">
    <div id="status">
        <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
    </div>
</div>
<!-- End Preloader-->

<div class="wrapper">
    @include('layout.left-sidebar')

    <div class="content-page">
        <div class="content">
            @include('layout.header')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('layout.footer')
    </div>


</div>


<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>


@yield('more_script')

</body>
</html>
