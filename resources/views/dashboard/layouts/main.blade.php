<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>@yield('title')</title>
    <style>
        nav {
            min-height: calc(100vh - 3rem)
        }

        main {
            width: calc(100% - 280px)
        }
    </style>
</head>

<body class="font-montserrat">
    @include('dashboard.layouts.header')
    <div class="flex w-full">
        @include('dashboard.layouts.sidebar')
        <main class="p-4 px-7 ml-[280px]">
            @yield('content')
        </main>
    </div>

    <script>
        feather.replace()
    </script>
    {{-- <script src="{{ asset('js/kunjunganChart.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/tamuChart.js') }}"></script> --}}
</body>

</html>
