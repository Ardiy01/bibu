<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/component.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/media-query.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="shotcut icon" href="{{ asset('assets/img/Logo.png') }}">
    <title>BIBU</title>
</head>

<body style="background-color: #f5fafa">
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.layouts.nav')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 col-12 px-0">
                @include('dashboard.layouts.header')
                @yield('content')
        </div>
    </div>

    {{-- script js --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/orders.js') }}"></script>
</body>

</html>
