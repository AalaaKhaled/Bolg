<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
   // $allPosts =Post::all();
    $allPosts =Post::paginate(10);
    $userId =  Auth::id();
    //dd($allPosts);
    return view('posts.index',['posts'=>$allPosts , 'userId'=>$userId]);
    
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

     $tags = Tag::all();
     //return view('posts.create',['users'=>User::all()]);
     return view('posts.create',['tags'=>$tags]);
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
     
    
    // $requestedData = $request->all();
   //  Post::create($requestedData);
    
  
  //  Post::create([
    //    'title'=> $request->title,
    //    'description'=>$request->description
    //  ]);
     //or
    
     //or
     
     $post = new Post;
     $post->title = $request->title;
     $post->description = $request->description;
     $post->user_id = Auth::id();
     $post->save();

     $post->tags()->sync($request->tags,false);

     return redirect()->route('posts.index');
    }
    public function edit($postId){
    
     $post = Post::find($postId);
     $tags = Tag::all();
    //  $tags2 = array();
    //  foreach($tags as $tag){
    //    $tags2[$tag->id] = $tag->name;
    //  }
    // return view('posts.edit',['post'=>$post,'users'=>User::all()]);
    return view('posts.edit',['post'=>$post,'tags'=>$tags]);
    }
    public function update(StorePostRequest $request,$postId){
    
      $post = Post::find($postId);
    
      $post->title = $request->title;
      $post->description = $request->description;
      $post->save();
      // if(isset($request->tags)){
      //   $post->tags()->sync($request->tags);
      // }else{
      //   $post->tags()->sync(array());
      // }
      $post->tags()->sync($request->tags);
      return redirect()->route('posts.index');
     }
     public function destroy($postId){
      $post = Post::find($postId);
      $post->delete();
      //return redirect()->route('posts.index');
     return response()->json(['success'=>'Post has been deleted']);
     }
}
