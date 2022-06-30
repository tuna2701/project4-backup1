<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/admin/css/styles.css">
    <link rel="shortcut icon" type="image/png" href="/upload/book/logo.png"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <title>Admin</title>
</head>

<body ng-app="myapp">
    <!-- header -->
    @include('includes.admin.header')
    <div id="layoutSidenav">
        <!-- sidebar -->
        @include('includes.admin.sidebar')
        <div id="layoutSidenav_content">
            <!-- content -->
            @yield('content')
            <!-- footer -->
            @include('includes.admin.footer')
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
    <script src="/assets/admin/js/scripts.js"></script>
    <!-- <script src="/assets/admin/js/datatables.js"></script> -->
</body>

</html>