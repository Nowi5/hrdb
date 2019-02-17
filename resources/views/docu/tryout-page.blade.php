@extends('layouts.docu')

@section('docu')
    <div class="card mb-3">
        <div class="card-header">Test the API - Try out!</div>
            <div class="card-body">
                <div class="alert alert-warning" role="alert">
                    Warning: The action you perform is a real API call and affect the productive database!
                </div>

                @include('docu.tryout')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            tryout("/api/v1", "GET", "")
        });
    </script>
@endpush
