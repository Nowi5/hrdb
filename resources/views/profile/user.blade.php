@extends('layouts.app')

@section('content')
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">
                        <profile-form></profile-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container"
        @if( !Auth::user()->organization_id)
            style="display:none"
        @endif
    >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Organization Details') }}</div>
                    <div class="card-body">
                        <organization-form></organization-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
