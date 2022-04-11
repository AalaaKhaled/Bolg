
@extends('layouts.app')
@section('title', '| All Tags')
@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td>{{ $tag->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-3">
			<div class="well">
                <form method="POST" action="{{ route('tags.store') }}">
                    @csrf
                    <h2>New Tag</h2>
                    <div class="mb-3">
                      <label for="name" >Name:</label>
                      <input type="text" name="name" class="form-control" id="name" >
                    </div>
       
                    <button type="submit" class="btn btn-primary btn-block btn-h1-spacing">Create New Tag</button>
                  </form>
                  
			</div>
		</div>
	</div>

@endsection