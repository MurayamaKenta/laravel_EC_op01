<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('includes.head')

<body>
<div id="app">
    @extends('includes.menu')
    <main class="py-4">
        @yield('content')
    </main>
</div>
@stack('js')
</body>
</html>
