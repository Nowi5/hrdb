@component('mail::message')
    You have a new message

    @component('mail::table')
        |               |                           |
        | ------------- | ------------------------- |
        | Name:         | {{ $contact['name'] }}    |
        | E-Mail:       | {{ $contact['email'] }}   |
        | Message:      | {{ $contact['message'] }} |
    @endcomponent

@endcomponent
