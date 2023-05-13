<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    @include('frontend.layouts.partials.style')
</head>
<body>
    @include('frontend.shared.nav')

    @yield('content')
    
    @include('frontend.shared.footer')

    @include('frontend.layouts.partials.script')
</body>
</html>
