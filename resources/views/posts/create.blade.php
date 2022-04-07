@extends('layouts.app')
@section('title' , 'Show Page')
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
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="mb-3">
      <label for="title" >Title :</label>
      <input type="text" name="title" class="form-control" id="title" >
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descreption :</label>
      <textarea name="description" class="form-control" id="description"></textarea>
    </div>
    {{--  
    <div class="mb-3">
      <label for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
        @foreach ($users as $user)
         <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach 
      </select>
    </div>--}}
    <button type="submit" class="btn btn-success">Create Post</button>
  </form>
@endsection