<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arena Futsal 77</title>

    @include('layouts.admin.css')
    @yield('css')
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Header -->
        @include('layouts.admin.sidebar')
        <!-- Close Header -->

        <!-- Content Start -->
        <div class="content">
            @include('layouts.admin.navbar')

            @yield('content')

            <!-- Start Footer -->
            @include('layouts.admin.footer')
        </div>
        <!-- Content End -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Start Script -->
    @include('layouts.admin.js')
    @yield('js')
    <!-- End Script -->
</body>
