<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
class postController extends Controller
{
    private  $posts = [ 
        ["id" => 1, "Title" => "Learn PHP", "Posted By" => "Ahmed", "Created At" => "2018-04-10"],
        ["id" => 2, "Title" => "Solid Principles", "Posted By" => "Mohamed", "Created At" => "2018-04-12"], 
        ["id" => 3, "Title" => "Design Patterns", "Posted By" => "Ali", "Created At" => "2018-04-13"]
    ];
    function index() {
        
      $posts = post::all();
        return view('posts.posts' , ['posts'=> $posts]);
       
    }

    function show($id) {
        
        $post = post::find($id);
        if($post == null){
            abort(code:404);
        } 
        return view('posts.show' , ['posts'=> $post]);
    }


    

    function edit($id) {
            $post = Post::find($id);
        
            if (!$post) {
                return redirect()->route('posts.index')->with('error', 'Post not found');
            }
        
            return view('posts.edit');
       
    }

    function create() {

      return view("posts.create");   
    
    }

    function store() {
        $data = request()->all();
        $post = new post();
        $post->title = $data["title"];
        $post->image = $data["image"];
        $post->Description = $data["Description"];
        $post->postedBy = $data["postedBy"];
        $post->created_at = $data["created_at"];
        $post->updated_at = $data["updated_at"];
        $post->save();
        return 'saved' . to_route("posts.posts");
    }

    function destroy($id){

      $post = post::find($id);
        if($post == null){
            abort(code:404);
        }
        $post->delete();
        return to_route("posts.index");
    }

  
}
