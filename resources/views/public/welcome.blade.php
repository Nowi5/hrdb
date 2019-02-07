@extends('layouts.public')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                <img src="/img/HRDB-icon.png"/>HRDB<sup><span class="badge badge-info bg-primary" style="font-size:20px; vertical-align: super;">Alpha</span></sup>
            </div>
            <p>
                The service for uncomplicated exchange of HR related data.
            </p>
            @guest
                <div class="links">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                            <a href="{{ route('register') }}"><i class="fa fa-sign-in"></i> {{ __('Register') }}</a>
                    @endif
                    <a href="https://github.com/Nowi5/hrdb/"><i class="fa fa-github"></i> GitHub</a>

                </div>
            @else
                <a class="btn btn-primary" role="button" href="{{ route('home') }}"><i class="fa fa-home"></i> {{ __('Dashboard') }}</a>
                <a class="btn btn-outline-secondary" role="button" href="https://github.com/Nowi5/hrdb/"><i class="fa fa-github"></i> GitHub</a>
            @endguest
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div id="accordion" class="col-8 col-centered">
                <h3>FAQ</h3>
                <div class="card">
                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="mb-0 btn-link">
                            Who sould use HRDB?
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            HRDB is built for HR Startups and corporations which are interested in recruitment and organizational topics in a collaborative approach.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h5 class="mb-0 btn-link">
                               What will it cost? What is the price?
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            HRDB is a free to use service.  The service is free of charge and base on a fair use principle.
                            The first 100 up- & downloads per month are not limited.
                            After the free volume, downloads are only allowed if related uploads were generated. This will ensure that givers and takers are in balance.
                            To ensure, that there is not player which overrules the others, uploads are only possible to 50% of the total job postings on the platform.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h5 class="mb-0 btn-link">
                            How can I get access?
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            HRDB is a shared web application which is build to improve the data exchange between HR companies.
                            If you think you should join that journey, please sign up and explore together with your technical expert the oppertinuties.
                            The service is not open for private user and base on invite only. Please use the contact form in case you do not have a invite code. After registration and email verification you can visit the dashboard and generate an API Access token. With the token the complete API can be used.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection