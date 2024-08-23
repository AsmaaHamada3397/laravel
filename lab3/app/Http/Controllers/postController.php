<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\post;
use Carbon\Carbon;


class postController extends Controller
{
  
    function index() {
        
      $posts = post::all();
        //return view('posts.posts' , ['posts'=> $posts]);

        $posts = Post::paginate(2);
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
        $post->created_at = $data["created_at"];
       
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
