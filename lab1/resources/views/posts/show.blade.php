@extends('layouts.app')

@section("content")
    <div class="container mt-5 w-50 text-center">
        <div class="card">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$posts["Title"]}}</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
    </div>
    

@endsection