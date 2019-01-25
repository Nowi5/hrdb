@extends('layouts.docu')

@section('docu')
    <div class="card mb-3">
        <div class="card-header">How to access HRDB API?</div>
        <div class="card-body">
            <p>
                HRDB offers with <a href="https://laravel.com/docs/5.7/passport" target="_blank">Laravel Passport</a> Oauth2. In your <a href="{{ route('passport') }}">Oauth</a> section you can register new clients and generate new personal access tokens.<br />
                This documentation assumes you are already familiar with OAuth2. If you do not know anything about OAuth2, consider familiarizing yourself with the general <a href="https://oauth2.thephpleague.com/terminology/">terminology</a>  and features of OAuth2 before continuing.<br/>
                <br/>
                A easy way to to use the API is the following:<br/>
                <ol>
                    <li>Generate a new <a href="{{ route('passport') }}">personal access tokens</a>. Save the access token on a secure place.</li>
                    <li>To test the API use a REST API Client like <a href="https://install.advancedrestclient.com/install">Advanced Rest Client</a></li>
                    <li>Add a Header 'Authorization' with the value 'Bearer XYZ', while XYZ is your personal access token</li>
                    <li>Send a GET request to '/api/v1/user'</li>
                    <li>Check the response for 200 OK. You should see a basic dataset of your profile including email address</li>
                </ol>
            </p>
            <img class="img-fluid img-thumbnail" src="/img/docu/access_example.png" />
        </div>
    </div>
@endsection
