@extends('layouts.app')

@section('title', 'show')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    @if($userData?->id)
        <div class="card mx-auto my-3" style="width: 18rem;">
            <img src="{{ asset('images/profileimages/'.$userData->profile) }}" class="card-img-top" alt="Profile Photo">
            <div class="card-body bg-primary-subtle">
                <h5 class="card-title">{{ $userData->name }}</h5>
                <p class="card-text">{{ $userData->email }}</p>
                <a href="{{ route('user.edit', [session('user')->id]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    @else
        <h4 class="card-title"> User Not Exist! </h4>
    @endif
</div>      
@endsection