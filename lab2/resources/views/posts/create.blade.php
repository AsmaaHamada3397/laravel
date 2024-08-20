@extends('layouts.app')

@section("content")
    
    <div class="container mt-5">
        <h1>Creat a Post</h1>
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control"  name="description" id="description">
            </div>
            
            <div class="mb-3 form-check">
                <label class="form-check-label" for="exampleCheck1">Post Creator</label>
                <input type="text" class="form-control" id="creator" name="creator">
            </div>
            <input type="submit" class="btn btn-sucess" value="Create">
        </form>
    </div>
   

    @endsection
