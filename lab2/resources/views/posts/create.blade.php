@extends('layouts.app')

@section("content")

    <div class="container mt-5">
        <h1 class="mt-5 text-danger"> Create your post!</h1>
        <form method="get">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleCheck1">Post Creator</label>
                <input type="text" class="form-control" id="creator" name="creator">
            </div>
            <button type="submit" class="btn btn-success rounded-3 mt-3">Create</button>
        </form>
    </div>
   

    @endsection
