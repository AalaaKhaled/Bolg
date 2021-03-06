<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       // return Post::all();
       ///
    //    $posts = Post::all();
    //    $mappedPosts = [];
    //    foreach($posts as $post){
    //        $mappedPosts [] =[
    //          'id' => $post->id,
    //          'title' => $post->title,
    //        ];
    //    }
    //    return $mappedPosts;
       ///
       $posts = Post::all();
       return PostResource::collection($posts);
    }
    public function show(Post $post)
    {
        //return $post;
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
      $post = Post::create($request->all());
      return new PostResource($post);
    }
}
