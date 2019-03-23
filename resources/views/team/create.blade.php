@extends('template')

@section('content')
	<form action="{{ action('Web\TeamController@store') }}" method="POST">
		@csrf
		@inputTextBox('title')

		<button class="btn btn-primary">Create</button>
	</form>
@endsection