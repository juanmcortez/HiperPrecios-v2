<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @includeIf('components.analytics.google')

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title / Description -->
    <title>
        {{ isset($title) ? $title . ' - ' . config('app.name') . ' ' . config('app.version') : config('app.name') . ' ' . config('app.version') }}
    </title>
    <meta name="description" content="{{ isset($description) ? $description : '' }}">

    <!-- Styles -->
    <link href="{{ mix('css/hiperprecios.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme_print.css') }}" rel="stylesheet" media="print" />

    @stack('styles')

</head>

<body class="overflow-x-hidden text-xs antialiased lg:text-sm xl:text-base text-gray-800">

    <x-alerts.ribbon />

    <main class="min-w-screen min-h-screen bg-gray-100 flex items-start justify-center font-sans overflow-hidden">
        <div class="w-full p-6">

            <x-menus.top />

            <div class="bg-white shadow-md rounded">
                {{ $slot }}
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/hiperprecios.js') }}" defer></script>

    @stack('scripts')

</body>

</html>
