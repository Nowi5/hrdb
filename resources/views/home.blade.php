@extends('layouts.app')

@section('content')
<div class="container">



    <div class="row">
        <div class="col-md-9">

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
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
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card text-white bg-primary o-hidden h-100">
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

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Views (last 30 days)</div>
                        <div class="card-body">
                            <canvas id="monthlyVists" height="250"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Most used APIs</div>
                        <div class="card-body">
                            <canvas id="apiUsage" height="250"></canvas>
                        </div>
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

@section('scripts')
    <!-- @todo: Replace include within app.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>

    <script type="application/javascript">
        function getRandomColor(color) {
            var p = 1,
                temp,
                random = Math.random(),
                result = '#';

            while (p < color.length) {
                temp = parseInt(color.slice(p, p += 2), 16)
                temp += Math.floor((255 - temp) * random);
                result += temp.toString(16).padStart(2, '0');
            }
            return result;
        }

        var color = '#6574cd';


        /* MONTHLY VIEWS / VISTS CHART */
        var ctxMV = document.getElementById("monthlyVists");
        var myLineChart = new Chart(ctxMV, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_column($aPageViews, 'date')) !!}, //["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "Views",
                    data: {!! json_encode(array_column($aPageViews, 'total')) !!},// [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(101,116,205,0.2)', // '#6574cd', // 'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(101,116,205,0.7)',
                    ],
                    borderWidth: 2
                }
                ]
            },
            options: {
                responsive: true
            }
        });

        /* API USAGE CHART */
        var ctxAU = document.getElementById("apiUsage");

        var colors = [];
        for (i = 0; i < {{ sizeof($aPageViewsByRoute) }}; i++) {
            colors[i] = getRandomColor(color);
        }

        var myLineChart = new Chart(ctxAU, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_column($aPageViewsByRoute, 'name')) !!},
                datasets: [{
                    data: {!! json_encode(array_column($aPageViewsByRoute, 'views')) !!},
                    backgroundColor: colors,
                    //hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection