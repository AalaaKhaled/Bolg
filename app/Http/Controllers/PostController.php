<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
   public function index()
   {

     // get from query from database data
    //  $allPosts = [
    //     ['id' => 1 ,'title'=>'laravel' , 'posted_by'=>'alaa','created_at'=>'2021-02-14'],
    //     ['id' => 2 ,'title'=>'php' , 'posted_by'=>'aalaa','created_at'=>'2021-02-15'],
    //     ['id' => 3 ,'title'=>'c' , 'posted_by'=>'ela','created_at'=>'2021-02-16'],

    // ];
    $allPosts =Post::all();
    //dd($allPosts);
    return view('posts.index',['posts'=>$allPosts]);
    
   }
   ///public function show(Post $post) //Post::findOrFail()
   public function show($postId)
   {
     ///dd($post);
     // $post = ['id' => 1 ,'title'=>'laravel' ,'description'=>'laravel is awsome framework.', 'posted_by'=>'alaa','created_at'=>'2021-02-14'];
     $post = Post::find($postId);

     return view('posts.show',['post'=>$post]);
   }
   public function create()
   {
     
     return view('posts.create',['users'=>User::all()]);
   }
 //  public function store()
 //  public function store(Request $request)
  public function store(StorePostRequest $request)
   {
     /*validation

       $request->validate([
         'title' => ['required','min:3'],
         'description' => ['required','min:3'],
       ],
      [
        'title.required' => 'show this msg',
        'title.min'=>'override'
      ]
      );
     */

     // insert in db
     //$requestedData = request()->all();
     //dd($requestedData);
     
     $requestedData = $request->all();
    //  Post::create([
    //    'title'=> $request->title,
    //    'description'=>$request->description
    //  ]);
     //or
     Post::create($requestedData);
     //or
    //  $post = new Post;
    //  $post->title = $request->title;
    //  $post->description = $request->description;
    //  $post->save();

     return redirect()->route('posts.index');
    }
}
