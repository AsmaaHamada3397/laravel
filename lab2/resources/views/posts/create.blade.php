@extends('layouts.app')

@section("content")

    <div class="container mt-5">

        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
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
