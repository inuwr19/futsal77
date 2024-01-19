<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arena Futsal 77</title>

    @include('layouts.customer.css')
    @yield('css')
</head>

<body>

    <!-- Header -->
    @include('layouts.customer.navbar')
    <!-- Close Header -->

    @yield('content')

    <!-- Start Footer -->
    @include('layouts.customer.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    @include('layouts.customer.js')
    @yield('js')
    <!-- End Script -->
</body>
