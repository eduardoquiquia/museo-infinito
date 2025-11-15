<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Museo Infinito')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- CONTENIDO DE CADA PÁGINA --}}
    <main class="pt-0 px-10">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

</body>
</html>
