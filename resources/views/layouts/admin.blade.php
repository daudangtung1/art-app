<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <!-- Scripts -->
    {{--    <script src="{{asset('js/lib/jquery-3.2.1.min.js')}}" defer></script>--}}
    {{--    <script src="{{asset('js/lib/owl.carousel.min.js')}}" defer></script>--}}
    {{--    <script src="{{asset('js/lib/jquery.justifiedGallery.min.js')}}" defer></script>--}}
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
<header>
</header>
<main>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</main>
<footer class="z-10 text-white bg-customBlack-16">
@livewireScripts
</body>
</html>
