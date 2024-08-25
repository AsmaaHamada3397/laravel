<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\post as ModelsPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=> 'required',
            'image'=> 'required|mimes:jpg,png,jpeg|max:2048',
            'description'=> 'required|max:3074',
            'postedBy'=>'required'    
        ]);
        if($request->has('image')){
            $imageName= time() .'.'. $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/images/'),$imageName);
        }
        $post= Post::create($data);
        return to_route("posts.index",$post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("posts.index")->with("success","post deleted successfully");
    }
}
