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

            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="mr-5">26 Unread Job Postings!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View all</span>
                            <span class="float-right">
                          <i class="fa fa-home"></i>
                        </span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <div class="mr-5">4 New Organizations</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View all</span>
                            <span class="float-right">
                          <i class="fa fa-home"></i>
                        </span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <div class="mr-5">You provide 31% of all job postings </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View all</span>
                            <span class="float-right">
                          <i class="fa fa-home"></i>
                        </span>
                        </a>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-3">

            @if(!$oAuthTokenExists)
                <div class="p-3 mb-3 bg-light rounded">
                    <h4>Get started</h4>
                    <p>
                        You do not have a personal access code. Create <a href="{{ route('passport') }}">here a OAuth Access Code</a>
                        and <a href="{{ route('docu.access') }}">read the documentation</a> to get started.
                    </p>

                </div>
            @endif

            <div class="p-3 mb-3 bg-light rounded">
                <h4>Invite other</h4>
                <p>HRDB works on invite only. If you believe other organizations should have access too, please send them the <a href="{{ route('register') }}">signup link</a> and your invite code</p>
                <input type="email" class="form-control text-center" disabled value="{{ $inviteToken }}">
            </div>

        </div>
    </div>
</div>
@endsection
