<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        //return view('posts.posts' , ['posts'=> $posts]);

        $posts = Post::paginate(2);
        return view('posts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");   

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     */
    function show($id)
    {
        $post = post::find($id);
        if($post == null){
            abort(code:404);
        } 
        return view('posts.show' , ['posts'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    function edit($id)
    {
        $post = Post::find($id); //
        
        if (!$post) {
            return to_route('posts.index')->with('error', 'Post not found');//
        }
        $post->save();
        return view('posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id)
    {
        $post = post::find($id);
        if($post == null){
            abort(code:404);
        }
        $post->delete();
        return to_route("posts.index");
    }
}}