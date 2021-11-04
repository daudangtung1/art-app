<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('css/lib/justifiedGallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/owl.carousel.min.css')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<header id="header-box" class="fixed top-0 left-0 right-0 bg-black text-white">
    <livewire:layouts.header></livewire:layouts.header>
</header>
<main>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</main>
<footer>
    <livewire:layouts.footer></livewire:layouts.footer>
</footer>
</body>
<script src="{{asset('js/lib/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/lib/jquery.justifiedGallery.min.js')}}"></script>
<script src="{{asset('js/lib/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/lib/particles.min.js')}}"></script>
<script src="{{asset('js/login-particles.js')}}"></script>
<script>
    $('#my-gallery').justifiedGallery({
        rowHeight: 250,
        lastRow: 'nojustify',
        margins: 10
    });
    $(function () {
        var shrinkHeader = 340;
        $(window).scroll(function () {
            var scroll = getCurrentScroll();
            if (scroll >= shrinkHeader) {
                $('#header-box').addClass('hidden');
                $('.header-nav').addClass('fixed top-0 left-0 right-0').removeClass('mx-16');
            } else {
                $('.header-nav').removeClass('fixed top-0 left-0 right-0').addClass('mx-16');
                $('#header-box').removeClass('hidden');
            }
        });

        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }

        $("#header-form").click(function () {
            $("#header-border").toggleClass("border-green-200");

            if ($('#header-border').hasClass("border-green-200")) {
                $('#header-border').removeClass('hover:border-red-200');
            } else {
                $('#header-border').addClass('hover:border-red-200');
            }
        });
    });
</script>
</html>
