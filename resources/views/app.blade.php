<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name') }}</title>

    <link rel="shortcut icon" href="{{ Vite::image('logo.png') }}" type="image/x-icon">

    <!-- Vite -->
    @vite('resources/js/app.js')
    @inertiaHead
    @routes
</head>
<body>
    @inertia
</body>
</html>
