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
    <link rel="stylesheet" href="{{ asset('assets/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.css') }}">

    <script src="{{ asset('/assets/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.css') }}"></script>
    <script src="{{ asset('') }}assets/bootstrap5/js/bootstrap.js"></script>
    <script src="{{ asset('') }}assets/bootbox/bootbox.js"></script>
    <script src="{{ asset('') }}assets/bootbox/bootbox.all.js"></script>
    @yield('js')
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons/font/bootstrap-icons.json') }}">

    <<link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/css/coreui.min.css" rel="stylesheet"
        integrity="sha384-u3h5SFn5baVOWbh8UkOrAaLXttgSF0vXI15ODtCSxl0v/VKivnCN6iHCcvlyTL7L" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/js/coreui.bundle.min.js"
            integrity="sha384-JdRP5GRWP6APhoVS1OM/pOKMWe7q9q8hpl+J2nhCfVJKoS+yzGtELC5REIYKrymn" crossorigin="anonymous">
        </script>

</head>

<body data-topbar="light">

    <div class="container continer_dash">
        <div class="card cust_card_body">

            @include('layouts.header')

            <div class="card-body cust_cardBody">
                <div class="container d-flex align-items-stretch">

                    @include('layouts.sidebar')

                    @yield('content')

                    {{-- @include('layouts.footer') --}}

                </div>
            </div>
        </div>
    </div>



</body>

</html>
