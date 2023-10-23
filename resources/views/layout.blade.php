<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/assets/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/assets/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/assets/images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ Vite::asset('resources/assets/images/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ Vite::asset('resources/assets/images/safari-pinned-tab.svg')}}" color="#7843E9">
    <meta name="msapplication-TileColor" content="#7843E9">
    <meta name="theme-color" content="#7843E9">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> -->
    @vite('resources/js/app.js')
</head>
<body class="antialiased">
    @if(session('message'))
         <div class="bg-green-600 text-white p-5 text-center">
            {{session('message')}}
         </div>
   @endif
    @yield('content')
</body>
</html>
