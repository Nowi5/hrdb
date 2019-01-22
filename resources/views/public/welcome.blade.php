@extends('layouts.public')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                <img src="/img/HRDB-icon.png"/>HRDB
                <sup><span class="badge badge-info bg-primary" style="font-size:20px; vertical-align: super;">Alpha</span></sup>
            </div>
            <p>
                The service for uncomplicated exchange of HR related data.
            </p>
            <div class="links">
                @guest
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                            <a href="{{ route('register') }}"><i class="fa fa-sign-in"></i> {{ __('Register') }}</a>
                    @endif
                @endguest
                <a href="https://github.com/Nowi5/hrdb/"><i class="fa fa-github"></i> GitHub</a>
            </div>
        </div>
    </div>
@endsection