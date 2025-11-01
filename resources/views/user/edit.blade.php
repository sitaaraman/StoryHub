@extends('layouts.app')

@section('title', 'edit')

@section('content')

    <form action="{{ route('user.update', [$userData->id]) }}" method="post" enctype="multipart/form-data" class="mx-3 py-3">
            @csrf 

            <fieldset>
                <legend>Edit Info</legend>

                <label for="name" class="form-label">Full Name:</label>
                <input type="text" name="name" id="name" value="{{ $userData->name}}" class="form-control">

                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" value="{{ $userData->email}}" class="form-control">

                <label for="profile" class="form-label">Profile:</label>
                
                <img src="{{ asset('images/profileimages/'.$userData->profile) }}" alt="Profile Photo" width="100px" height="100px" class="my-2">
                <input type="file" name="profile" id="profile" accept="image/*" class="form-control">

                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" value="{{ $userData->password}}" class="form-control">

                <input type="submit" value="Update" class="btn btn-primary mt-3">

            </fieldset>
        </form>

@endsection