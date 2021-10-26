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

    {{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}

</head>
<body>
<div class="wrapper bg-gray-200 grid xl:grid-cols-8 md:grid-cols-1 gap-0">
    <div class="bg-white">
        <livewire:layouts.admin.sidebar/>
    </div>

    <div class="main-panel xl:col-span-7 md:col-span-1 px-4">
        <header>
            <livewire:layouts.admin.header/>
        </header>
        <main>
            <div class="font-sans text-gray-900 antialiased">
                {{ $slot }}
            </div>
        </main>
        <footer class="z-10">
            <livewire:layouts.admin.footer/>
        </footer>
    </div>
</div>
<script>
    // $(document).ready(function () {
    //     $('#dataTable').DataTable();
    // });
</script>
<script src="{{asset('js/lib/jquery-3.2.1.min.js')}}"></script>
<script>
    setTimeout(() => {
        $('#mess').fadeOut('fast');
    }, 3000);
</script>
@livewireScripts
</body>
</html>
