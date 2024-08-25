@extends('layouts.app')

@section("content")

<div class="container mt-5">
    <form method="post" action="{{route('posts.update', $post)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
            @error("title")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="inputGroupFile02" value="{{$post->image}}">
            <label class="input-group-text" for="inputGroupFile02" >Upload</label>
            @error("image")
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label><br>
            <textarea type="description" class="form-control" name="description" id="description" value="{{$post->description}}"></textarea>
            @error("description")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3 ">
            <label for="postedBy">Post Creator</label><br>
            <input type="text" class=" form-control" id="postedBy" name="postedBy" value="{{$post->postedBy}}">
            @error("postedBy")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3">Update</button>
    </form>
</div>

@endsection