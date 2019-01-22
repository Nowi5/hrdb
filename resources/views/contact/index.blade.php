@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Contact') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('contact.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="Name">Name: </label>
                        <input type="text" class="form-control" id="name" placeholder="Your name" name="name" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control" id="email" placeholder="john@example.com" name="email" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="message">message: </label>
                        <textarea type="text" class="form-control luna-message" id="Message" placeholder="Type your messages here" name="message" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" value="Send">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection