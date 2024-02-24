<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @yield('title')
    @vite('resources/css/app.css')
</head>
@yield('content')
</html>