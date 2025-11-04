@extends('layouts.app')

@section('title', 'Post Show')

@section('content')

    <h4 class="m-0">Show Post Page</h4>
    
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mx-auto my-3" style="width: 28rem;">
            <img src="{{ asset('images/posts/'.$post->title) }}" alt="Post Image" class="card-img-top">
            <div class="card-body">
                <p class="card-text">{{ $post->body }}</p>
            </div>
        </div>

        @if(session('user_id') && session('user')->id == $post->user_id)
        <div class="text-center mx-auto py-3">
            <a href="{{ route('posts.edit', [$post->id])}}" class="btn btn-success">Edit Your Post</a>
            <a href="{{ route('posts.delete', [$post->id])}}" class="btn btn-danger">Delete Your Post</a>
        </div>
        @endif
    </div>

    <div class="card">
        @if(session()->has('user_id'))
                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-3">
                    @csrf 

                    <textarea name="comment" rows="3" class="form-control mb-2" placeholder="Write your comment..."></textarea>
                    <button type="submit" class="btn btn-success btn-sm">Comment</button>
                </form>
        @endif
    </div>

    <hr>

    <h4>Comments</h4>

    @foreach($post->comments as $comment)
        <div>

            <strong>{{ $comment->user->name }}</strong>:
            <p>{{ $comment->comment }}</p> 

            
            @if(session()->has('user_id') && session('user_id') == $comment->user_id)
            
            <form action="{{ route('comments.update' , $comment->id) }}" method="POST" class="edit-form" id="edit-form-{{ $comment->id }}">
                @csrf
                @method('POST')
                
                <textarea name="comment" rows="1" class="form-control">{{ $comment->comment }}</textarea>
                
                <button class="btn btn-success mt-2">Update Comment</button>
            </form>
            
            <span class="editcomment btn btn-warning mt-2" data-comment-id="{{ $comment->id }}">Edit</span>
                <a href="{{ route('comments.delete' , $comment->id) }}" class="btn btn-danger mt-2">Delete Comment</a>
            @endif

            <hr class="m-0">
        </div>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>
            $(document).ready(function(){

                $(".edit-form").hide();

                $(".editcomment").click(function(){
                    var commentId = $(this).data('comment-id');

                    $(".edit-form").hide();
                    $(".editcomment").show(); // Make sure Edit button is visible again after toggling

                    $(".editcomment").show();

                    $(this).hide();

                    $("#edit-form-" + commentId).toggle();

                    $("#comment-" + commentId + " .btn-danger").show();
                });
            });
        </script>
@endsection