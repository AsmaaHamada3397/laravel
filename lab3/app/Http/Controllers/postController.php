<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
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
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|max:3074',
            'postedBy' => 'required'    
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Generate a unique filename with the current timestamp
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            // Store the image in the 'posts' directory within the 'public' disk
            $data['image'] = $image->storeAs('posts', $filename, 'public');
        }
    
        $post = Post::create($data);
        return to_route("posts.index", $post);
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
        $data = $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|max:3074',
            'postedBy' => 'required'    
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Generate a unique filename with the current timestamp
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            // Store the image and update $data['image'] with the new path
            $data['image'] = $image->storeAs('posts', $filename, 'public');
        } else {
            // Retain the existing image if no new image is uploaded
            $data['image'] = $post->image;
        }
    
        $post->update($data);
    
        return to_route("posts.index", $post);
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
