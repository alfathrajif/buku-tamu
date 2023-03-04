<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="font-montserrat">
    <main class="flex min-h-screen justify-center items-center bg-green-500">@yield('content')</main>
    <script>
        feather.replace()
    </script>
</body>

</html>
