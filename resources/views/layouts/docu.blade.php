@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="p-3 mb-3 bg-light rounded">
                    <ul class="vnav nav flex-column">
                        <li>First steps:</li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.access') ? 'active' : '' }}">
                            <a class="nav-link active" href="{{ route('docu.access') }}">Access the API</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.fetchingdata') ? 'active' : '' }}">
                            <a class="nav-link active" href="{{ route('docu.fetchingdata') }}">Fetching Data</a>
                        </li>
                        <li><div class="dropdown-divider"></div></li>
                        <li>Resources:</li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.jobpostings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.jobpostings') }}">Job Postings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                @yield('docu')
            </div>
        </div>
    </div>
@endsection