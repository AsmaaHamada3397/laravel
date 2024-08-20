@extends('layouts.app')

@section("content")

    <div class="container">
        <table class="table text-center mt-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                    <th>Updated_At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td><img src='{{asset("images/posts/". $post->image)}}'></td>
                    <td>{{$post->Description}}</td>
                    <td>{{$post->postedBy}}</td>
                    <td>{{$post->created_At}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a href={{route("posts.show" , $post->id)}} class="btn btn-info">Show</a>
                        <a href={{ route("posts.edit", $post->id) }} class="btn btn-warning">Edit</a>
                        <a href="delete.php?id={{$post['id']}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="container mt-5 text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>

@endsection