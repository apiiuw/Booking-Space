<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>BookingSpace FIK UPNVJ</title>
    <link rel="icon" href="{{ asset('img/icon/Bs.png') }}">

    {{-- ICON --}}
    <script src="https://kit.fontawesome.com/d7833bfda5.js" crossorigin="anonymous"></script>

    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- DAISY UI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />

    {{-- ALPINE JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class=" font-josefinSans">
    @yield('container')
    @stack('scripts')
    
    <script type="module" src="{{ asset('resources/js/app.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script defer src="https://js.stripe.com/v3/"></script>
    <script defer src="https://m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</body>
</html>