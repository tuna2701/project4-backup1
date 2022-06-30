<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/assets/local/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/assets/local/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/local/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/assets/local/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/assets/local/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/assets/local/css/style.css"/>
    <link rel="shortcut icon" type="image/png" href="/upload/book/logo.png"/>
    
    <title>Book Store</title>
</head>

<body ng-app="myapp">
    <!-- header -->
    <div class="app">

        @include('includes.local.header')
        <!-- end header -->

        <!-- nav -->
        @include('includes.local.nav')

        <!-- end nav -->

        <!-- content -->
        <div class="container">
            @yield('content')
        </div>

        <!-- footer -->
        @include('includes.local.footer')
        <!-- end footer -->
    </div>
    
     
    <script src="/assets/local/js/jquery.min.js"></script>
    <script src="/js/angular.min.js"></script>
    <!-- <script src="/js/local/maincontroller.js"></script> -->

    <script src="/assets/local/js/bootstrap.min.js"></script>
    <script src="/assets/local/js/slick.min.js"></script>
    <script src="/assets/local/js/nouislider.min.js"></script>
    <script src="/assets/local/js/jquery.zoom.min.js"></script>
    <script src="/assets/local/js/main.js"></script>
</body>

</html>