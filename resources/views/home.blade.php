@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card mb-3">
        <div class="card-header">Welcome</div>
        <div class="card-body">

            <p>
                {{ __('message.tile') }}
                <strong>Welcome to HRDB,</strong><br/>
                Please maintain you <a href="">account details</a> first. After that you may like to explore existing job postings.
                In the next step we recommend that you read the <a href="">API Documentation</a>. With the API you can create and read further job postings.

            </p>


        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="p-3 mb-3">
                <h4>Invite other</h4>
                <p>HRDB works on invite only. If you believe other organizations should have access to, please send them the signup link and your invite code</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 mb-3 bg-light rounded">
                <h4>Invite other</h4>
                <p>HRDB works on invite only. If you believe other organizations should have access too, please send them the <a href="{{ route('register') }}">signup link</a> and your invite code</p>
                <input type="email" class="form-control text-center" disabled value="{{ $inviteToken }}">
            </div>
        </div>
    </div>
</div>
@endsection
