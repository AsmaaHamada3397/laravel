<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
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
        //return view('posts.posts' , ['posts'=> $posts]);

        $posts = Post::paginate(2); // Paginate by 10 items per page
        return view('posts.posts', compact('posts'));
    
    }

    function show($id) {
        
        $post = post::find($id);
        if($post == null){
            abort(code:404);
        } 
        return view('posts.show' , ['posts'=> $post]);
    }


    

    function edit($id) {
            $post = Post::find($id); //
        
            if (!$post) {
                return to_route('posts.index')->with('error', 'Post not found');//
            }
            $post->save();
            return view('posts.edit',['post' => $post]);
       
    }

    function create() {

      return view("posts.create");   
    
    }

    function store() {
        $data = request()->all();
        $image_path = '';
        if(request()->hasFile("image")){
        $image = request()->file("image");
        $image_path=$image->store("posts", 'public');

        $post = new Post();
        $post->title = $data["title"];
        $post->image = $image_path;
        $post->description = $data["description"];
        $post->postedBy = $data["postedBy"];
       
        $post->save();
        return to_route("posts.index");   
     }
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
