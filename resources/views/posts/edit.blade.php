@extends('layouts.app')
@section('title' , 'Edit Page')
@section('content')

@if ($errors->any())
<div class = "alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{ route('posts.update',['post'=>$post['id']]) }}">
@method('PUT')
@csrf
<div class="mb-3">
  <label for="title" >Title :</label>
  <input type="text" name="title" class="form-control" id="title" value="{{ $post['title'] }}">
</div>
<div class="mb-3">
  <label for="description" class="form-label">Descreption :</label>
  <textarea name="description" class="form-control" id="description">{{ $post['description'] }}</textarea>
</div>

<button type="submit" class="btn btn-success">Update Post</button>
</form>

@endsection