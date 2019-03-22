@extends('template')

@section('content')
    <h1>Pointing System</h1>

    @php
        echo URL::temporarySignedRoute('activateTeam', now()->addMinutes(1), ['team' => 1]);
    @endphp
@endsection