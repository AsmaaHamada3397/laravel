<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Carbon\Carbon;


class postController extends Controller
{

    function index()
    {

        $posts = post::all();
        //return view('posts.posts' , ['posts'=> $posts]);

        $posts = Post::paginate(3);
        return view('posts.posts', compact('posts'));
    }

    function show($id)
    {

        $post = post::find($id);
        if ($post == null) {
            abort(code: 404);
        }
        return view('posts.show', ['posts' => $post]);
    }






    function create()
    {

        return view("posts.create");
    }

    function store()
    {
        $data = request()->all();
        $image_path = '';
        if (request()->hasFile("image")) {
            $image = request()->file("image");
            $image_path = $image->store("posts", 'public');
            $post = new Post();
            $post->title = $data["title"];
            $post->image = $image_path;
            $post->description = $data["description"];
            $post->postedBy = $data["postedBy"];

            $post->save();
            return to_route("posts.index");
        }
    }
    function edit($id)
    {
        $post = Post::find($id); //

        if (!$post) {
            return to_route('posts.index')->with('error', 'Post not found'); //
        }
        $post->save();
        return view('posts.edit', ['post' => $post]);
    }

    // update
    public function update($id) {
        $post = Post::find($id);
    
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        if (request()->hasFile("image")) {
            $data = request()->all();
            $image = request()->file("image");
            $image_path = $image->store("posts", 'public');
            $post->title = $data["title"];
            $post->image = $image_path;
            $post->description = $data["description"];
            $post->postedBy = $data["postedBy"];
            
            $post->update();
            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }
    function destroy($id)
    {

        $post = post::find($id);
        if ($post == null) {
            abort(code: 404);
        }

        $post->delete();
        return to_route("posts.index");
    }
}}