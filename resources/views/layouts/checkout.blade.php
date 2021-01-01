<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('incluedes.style')
    @stack('prepend-style')
    @stack('addon-style')
</head>

<body>
    
    @include('incluedes.navbar-alternate')

    @yield('content')

    @include('incluedes.footer')

    @stack('prepend-style')
    @include('incluedes.script')
    @stack('addon-script')

</body>

</html>