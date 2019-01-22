<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
<div id="app">
    @include('layouts.navbar')
    <main class="py-4">
        <!-- EU Cookie Law -->
        @include('cookieConsent::index')
        @include('layouts.messages')

        @yield('content')
    </main>
    <footer class="footer bg-dark">
        @include('layouts.footer')
    </footer>
</div>

</body>
</html>
