@extends('layouts.app')

{{-- @section('title')  Index Page  @endsection --}}

@section('title' , 'Index Page')
    
@section('content')

<a href="{{ route('posts.create') }}" class="btn btn-success"style="margin-bottom:20px;">Creat Post</a>

<table class="table">
  <thead>
    <tr >
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   @foreach($posts as $post)
    <tr id="{{ $post->id }}">
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user ? $post->user->name : 'user not found'}}</td>
      <td>{{$post->created_at}}</td>
      <td>
      {{-- <a href="/posts/{{ $post['id'] }}" class="btn btn-info"style="margin-bottom:20px;">View</a> --}}
      <a href="{{ route('posts.show',['post'=>$post->id]) }}" class="btn btn-info"style="margin-bottom:20px;">View</a>
     
     @if ($post->user->id == $userId)
      <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-secondary"style="margin-bottom:20px;">Edit</a>
     {{-- <formmethod="POST"action="route('posts.destroy',['post'=>$post->id]) \}}" style="display: inline">
       @method('DELETE')
       @csrf
      <button type="submit" class="btn btn-danger" style="margin-bottom:20px;">Delete</button>
      </form>--}}
      <a onclick="deletePost({{ $post->id }})"class="btn btn-danger" style="margin-bottom:20px;">Delete</a>
      @endif
    </td>

    </tr>
    @endforeach
  </tbody>
</table>
<div class="text-center">
{{ $posts ->links("pagination::bootstrap-4") }}
</div>
@endsection
@section('scripts')
 <script>
   function deletePost(id){
    if(confirm("Do you realy want to delete this post ?")){
      $.ajax(
        {
          url:'/posts/'+id,
          type:'Delete',
          data:{
            _token :$("input[name=_token]").val()
          },
          success:function(response){
           $("#"+id).remove();  
          }
        }
      )
    }
   }
 </script>
@endsection
