<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- icon awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.min.css') }}">

    {{-- sweetalert --}}
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="pt-2">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow rounded-md">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    {{-- chart apex --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('added'))
            Swal.fire({
                title: "berhasil",
                text: "Data Berhasil Disimpan",
                icon: "success"
            });
        @endif
    </script>

</body>

</html>
