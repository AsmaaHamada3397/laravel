@extends('layouts.app')

@section("content")

<div class="container mt-5">
    <form method="post" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control w-50" name="title" id="title" value="{{old("title")}}">
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="inputGroupFile02" value="{{old("image")}}">
            <label class="input-group-text" for="inputGroupFile02" >Upload</label>
            </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label><br>
            <textarea name="description" id="description" cols="70" value="{{old("Description")}}"></textarea>
        </div>
        <div class="mb-3 ">
            <label for="postedBy">Post Creator</label><br>
            <input type="text" class=" form-control w-50" id="postedBy" name="postedBy" value="{{old("postedBy")}}">
        </div>
        <button type="submit" class="btn btn-primary my-3">Update</button>
    </form>
</div>

@endsection