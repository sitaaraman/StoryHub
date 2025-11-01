@extends('layouts.app')

@section('title', 'Post Show')

@section('content')

    <div class="container">
        <h3 class="py-3">Edit Comment</h3>

        <form action="{{ route('comments.update' , $comment->id) }}" method="POST">
            @csrf
            @method('POST')

            <textarea name="comment" rows="1" class="form-control">{{ $comment->comment }}</textarea>

            <button class="btn btn-success mt-2">Update Comment</button>
        </form>
    </div>

@endsection