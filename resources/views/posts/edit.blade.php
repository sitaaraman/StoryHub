@extends('layouts.app')

@section('title', 'Edit Your Post')

@section('content')

    @if(session()->has('user'))
    
        <h4 class='text-center m-0 py-3'>Welcome to home page for Post, {{ session('user')->name}} </h4>

        <div class="container">
            <form action="{{ route('posts.update', [$post->id])}}" method="post" class="" enctype="multipart/form-data">
                @csrf 

                <div class="card mx-auto my-3" style="width: 28rem;">
                    <img src="{{ asset('images/posts/'.$post->title) }}" alt="Post Image" class="card-img-top">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Post Image</label>
                    <input class="form-control" type="file" id="formFile" name="title" accept="image/*">
                </div>

                <div class="pb-3">
                    <label for="formBody" class="form-label">Post textarea</label>
                    <textarea class="form-control" id="formBody" rows="1" name="body">{{ $post->body }}</textarea>
                </div>

                <div class="text-center mx-auto py-3">
                    <input class="btn btn-success" type="submit" value="Update post">
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