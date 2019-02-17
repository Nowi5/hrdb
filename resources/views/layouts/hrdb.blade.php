@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="p-3 mb-3 bg-light rounded">
                    <ul class="vnav nav flex-column">
                        <li class="nav-item {{ Route::currentRouteNamed('hrdb.jobpostings') ? 'active' : '' }}">
                            <a class="nav-link active" href="{{ route('hrdb.jobpostings') }}">Jobpostings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                @yield('hrdb')
            </div>
        </div>
    </div>
@endsection
