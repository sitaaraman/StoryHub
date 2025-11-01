@extends('layouts.app')

@section('title', 'Post Index')

@section('content')

    <div class="row row-cols-md-3 g-4 mx-2">

        @foreach($posts as $p)
        <div class="col">
            <div class="card my-2" style="width: 28rem;">

                <a href="{{ route('posts.show', [$p->id]) }}">
                    <img src="{{ asset('images/posts/'.$p->title) }}" alt="Post Image" class="card-img-top" style="height: 18rem;">
                </a>
                
                <div class="card-body">
                    <p class="card-text">{{ $p->body }}</p>
                </div>

            </div>
        </div>
        @endforeach

    </div>

@endsection