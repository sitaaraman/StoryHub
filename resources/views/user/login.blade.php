@extends('layouts.app')

@section('title', 'loginPage')

@section('content')

  <form method="POST" action="{{ route('user.logincheck') }}" class="mx-3 py-3">
    @csrf 

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
      @error('email')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      @error('password')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>
  
  <hr>

    <p class="text-center mb-0">
        Not registered? 
        <a href="{{ route('user.create') }}" class="text-primary fw-bold">Create an account</a>
    </p>
    
  @if (session('status'))
      <div class="alert alert-danger m-0">{{ session('status') }}</div>
  @endif

@endsection