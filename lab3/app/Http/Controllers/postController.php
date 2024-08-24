<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class postController extends Controller
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
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=> "required|max:300|string",
            "image"=> "required|mimes:png,jpg,jpeg|max:2048",
            "description"=> "required|max:3072",
            "postedBy"=> "required|string|max:2048",
        ]);


    //     $data = request()->all();
    //     $image_path = '';
    //     if (request()->hasFile("image")) {
    //         $image = request()->file("image");
    //         $image_path = $image->store("posts", 'public');
    //     }
    //     $data["image"] = $image_path;
    //     $post = post::create($data);
         
    //     return to_route("post::post.index",$post);
    // }

    /**
     * Display the specified resource.
     */
     function show(post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
     function edit(post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
     function update(Request $request, post $post)
    {
        $request->validate([
            "title"=> "required|max:300|string",
            "image"=> "required|mimes:png,jpg,jpeg|max:2048",
            "description"=> "required|max:3072",
            "postedBy"=> "required|string|max:2048",
        ]);


        // $data = request()->all();
        // $image_path = $post->image;
        // if (request()->hasFile("image")) {
        //     $image = request()->file("image");
        //     $image_path = $image->store("posts", 'public');
        // }
        // $data["image"] = $image_path;
        // $post ->update($data);
         
        return to_route("post.show",$post)->with("updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
     function destroy(post $post)
    {
        $post->delete();
        return to_route('students.index');
    }
}}
