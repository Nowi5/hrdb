<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
<div id="app">
    @include('layouts.navbar')

    <main class="py-4">
        @include('layouts.messages')
        @yield('content')
    </main>
</div>

</body>
</html>
