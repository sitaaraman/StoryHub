@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @if(session()->has('user'))
    
        <h4 class='text-center m-0 py-3'>Welcome to home page for Post, {{ session('user')->name}} </h4>

        <div class="text-center mx-auto py-3">
            <a href="{{ route('posts.create')}}" class="btn btn-success">Create Posts</a>
        </div>

    @else

        <h4 class='text-center m-0 py-3'>Welcome to page for Post</h4>
        <div class="text-center mx-auto py-3">
            <a href="{{ route('user.create')}}" class="btn btn-success">Registration</a>
        </div>
        
    @endif
@endsection