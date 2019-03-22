@extends('template')

@section('content')
	<form action="{{ action('Web\TeamController@store') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" id="title" class="form-control">
			<button class="btn btn-primary">Create</button>
		</div>
	</form>
@endsection