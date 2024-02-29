<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @yield('title')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
@yield('content')
</html>