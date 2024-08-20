@extends('layouts.app')

@section("content")

    <div class="container">
        <table class="table text-center mt-5">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post['id']}}</td>
                    <td>{{$post['Title']}}</td>
                    <td>{{$post['Posted By']}}</td>
                    <td> {{$post['Created At']}}</td>
                    <td>
                        <a href={{route("posts.show" , $post["id"])}} class="btn btn-info">Show</a>
                        <a href={{ route("posts.edit", $post['id']) }} class="btn btn-warning">Edit</a>
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