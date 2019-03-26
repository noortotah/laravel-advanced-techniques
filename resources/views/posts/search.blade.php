@extends('layouts.app')

@section('content')
	<div class="container">
	
		<div class="col-8  mx-auto">
			<form class="form-inline"  action="{{ route('posts.search') }}" method="GET">
				@csrf
		  <label class="sr-only" for="inlineFormInputName2">Search</label>
		  <input name="search" type="text" class="form-control mb-2 col input-group-lg" id="search" type="search" placeholder="Search for posts ..." value="{{ old('search') }}">
		
		
		
		
		  <button type="submit" class="btn btn-primary mb-2 btn-lg">Search</button>
		</form>
		</div>
	
		@foreach ($results as $post)
			<div class="row">
				<div class="col-md-8">
					<h3>{{ $post->title }}</h3>
				</div>
				<div class="col-md-4">
					@if ($post->published)
						<h4><span class="label label-success mr-auto">Published</span></h4>
					@else
						<h4><span class="label label-default mr-auto">DRAFT</span></h4>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col">
					<p>
						{{ str_limit($post->content, 250) }}
					</p>
				</div>
			</div>
		@endforeach
		@if (count($results) > 0)
			<div class="text-center">
				{{ $results->appends(Request::except('page'))->links() }}
			</div>
		@endif
	</div>	



	
@endsection


