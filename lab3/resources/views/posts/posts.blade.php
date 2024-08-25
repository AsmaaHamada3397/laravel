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
                    <td><img src='{{asset("images/posts/". $post->image)}}' width="50" height="50"></td>
                    <td>{{$post->Description}}</td>
                    <td>{{$post->postedBy}}</td>
                    <td>{{$post->created_at->format('d M Y , h:i A')}}</td> <!--H for 24 hours and h for 12hour-->
                    <td>{{$post->updated_at->format('d M Y , h:i A')}}</td> <!--A for AM/PM hours and a for am/pm-->
                    <td>
                        <a href={{route("posts.show" , $post)}} class="btn btn-info">Show</a>
                        <a href={{route("posts.edit", $post)}} class="btn btn-warning">Edit</a>
                        <form action="{{route('posts.destroy', $post->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="container my-5 text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>
    <div class="d-flex justify-content-center mb-4">
        {{ $posts->links() }}
    </div>
@endsection

