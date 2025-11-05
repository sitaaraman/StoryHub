@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @if(session()->has('user'))
    
        <h4 class='text-center m-0 py-3'>Welcome to home page for Post, {{ session('user')->name}} ! </h4>

        <div class="container">
            <form action="{{ route('posts.store')}}" method="post" class="" enctype="multipart/form-data">
                @csrf 

                <div class="mb-3">
                    <label for="formFile" class="form-label">Post Image :</label>
                    <input class="form-control" type="file" id="formFile" name="title" accept="image/*">
                </div>

                <div class="pb-3">
                    <label for="formBody" class="form-label">About Image :</label>
                    <textarea class="form-control" id="formBody" rows="1" name="body"></textarea>
                </div>

                <div class="text-center mx-auto py-3">
                    <input class="btn btn-success" type="submit" value="Upload">
                </div>
            </form>
        
        </div>

    @else

        <h4 class='text-center m-0 py-3'>Welcome to page for Post</h4>
        <div class="text-center mx-auto py-3">
            <a href="{{ route('user.create')}}" class="btn btn-success">Registration</a>
        </div>
        
    @endif
@endsection