@extends('layouts.app')
@section('title' , 'Edit Page')
@section('stylesheets')
<link href='/css/select2.min.css' rel="stylesheet" />
@endsection
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

<label for="tags" >Tags:</label>
<select class="form-control select2-multiple" name="tags[]" multiple="multiple">
  @foreach ($tags as $tag)
  <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
  @endforeach
  
</select>

<button type="submit" class="btn btn-success" style="margin-top: 20px">Update Post</button>
</form>

@endsection

@section('scripts')
<script src="/js/select2.min.js"></script>
<script>
$(document).ready(function() {
   
    $('.select2-multiple').select2();
   
    $('.select2-multiple').select2().val({{ $post->tags->pluck('id') }}).trigger('change');

});
</script>
@endsection