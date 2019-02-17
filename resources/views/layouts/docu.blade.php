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
                        <li class="nav-item {{ Route::currentRouteNamed('docu.tryout') ? 'active' : '' }}">
                            <a class="nav-link active" href="{{ route('docu.tryout') }}">Test API</a>
                        </li>
                        <li><div class="dropdown-divider"></div></li>
                        <li>Core Resources:</li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.jobpostings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.jobpostings') }}">Job Postings</a>
                        </li>
                        <li><div class="dropdown-divider"></div></li>
                        <li>Utilities:</li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.cities') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.cities') }}">Cities</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.countries') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.countries') }}">Countries</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.languages') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.languages') }}">Languages</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.locations') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.locations') }}">Locations</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.states') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.states') }}">States</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteNamed('docu.streets') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('docu.streets') }}">Streets</a>
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
