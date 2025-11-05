@extends('layouts.app')

@section('title', 'posts')

@section('content')

    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data"  class="mx-3 py-3">
        @csrf 

        <fieldset>
            <legend>Create User</legend>

            <label for="name" class="form-label">Full Name:</label>
            <input type="text" name="name" id="name" class="form-control">

            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control">

            <label for="profile" class="form-label">Profile:</label>
            <input type="file" name="profile" id="profile" accept="image/*" class="form-control">

            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control">

            <input type="submit" value="Submit" class="btn btn-primary mt-3">

        </fieldset>
    </form>

    <hr>
        <p class="text-center m-0">
            Already registered?
            <a href="{{ route('user.login') }}" class="text-primary fw-bold">Login here</a>
        </p>
@endsection