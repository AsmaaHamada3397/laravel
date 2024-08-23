<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    private  $posts = [
        ["id" => 1, "Title" => "Learn PHP", "Posted By" => "Ahmed", "Created At" => "2018-04-10"],
        ["id" => 2, "Title" => "Solid Principles", "Posted By" => "Mohamed", "Created At" => "2018-04-12"], 
        ["id" => 3, "Title" => "Design Patterns", "Posted By" => "Ali", "Created At" => "2018-04-13"]
    ];
    function index() {

      $posts = $this->posts;
        
        return view('posts.posts' , ['posts'=> $posts]);
    }

    function show($id) {
        $posts = $this->posts;

        foreach ($posts as $post) {
            if ($post["id"] == $id) {
                return view("posts.show", ["posts"=> $post]);
            }
        } 
    }


    function edit($id) {
        $posts = $this->posts;

        foreach ($posts as $post) {
            if ($post["id"] == $id) {
                return view("posts.edit", ["post" => $post]);
            }
        }
       
    }

    public function create(){
        
      return view("posts.create");       
    }

    function store(){
        return view("posts.store");
    }
}
