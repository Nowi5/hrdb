<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
<div id="app">
    @include('layouts.navbar')

    <div style="background-color:#6574cd" class="adminnav pt-3">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('home') ? 'active' : '' }}" href="{{ route('home') }}"><i class="fa fa-home"></i> {{ __('Dashboard') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('hrdb*') ? 'active' : '' }}" href="{{ route('hrdb.jobpostings') }}">HRDB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('docu*') ? 'active' : '' }}" href="{{ route('docu.access') }}">API Documentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('passport') ? 'active' : '' }}" href="{{ route('passport') }}">OAuth</a>
                </li>
            </ul>
        </div>
    </div>

    <main class="py-4">
        @include('layouts.messages')
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
@yield('scripts')

</body>
</html>
