<!doctype html>
<html lang="en">

<head>

    <title>{{ config('app.name') ? config('app.name') : '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Themesdesign" name="author" />

    {{-- {{ asset('') }} --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap-utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login/login.css') }}">


    <script src="{{ asset('assets/bootstrap5/js/bootstrap.css') }}"></script>

</head>

<body data-topbar="light">

    <div>

        {{-- Main Content --}}

        <div class="main-content">

            @yield('content')

        </div>

        {{-- End Main Content --}}

    </div>
</body>

</html>
