<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'my Post')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #db6930;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">UserPosts</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="{{ route('posts.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            @if (session()->has('user'))
                                <a class="nav-link text-white" href="{{ route('posts.create')}}">Posts</a>
                            @else
                                <a class="nav-link text-white" href="{{ route('user.login')}}">Posts</a>
                            @endif
                        </li>
                        
                        @if(session()->has('user'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('user.show', [session('user')->id]) }}">
                                Welcome, {{ session('user')->name ?? 'User' }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('user.logout') }}">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('user.delete', [session('user')->id]) }}">Delete Account</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('user.create')}}">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('user.login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-warning-subtle">
        @yield('content')
    </main>

    <footer class="text-center text-lg-start" style="background-color: #db6930;">
        <div class="container d-flex justify-content-center py-5">
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
                <i class="fab fa-facebook-f"></i>
            </button>
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
                <i class="fab fa-youtube"></i>
            </button>
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
                <i class="fab fa-instagram"></i>
            </button>
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
                <i class="fab fa-twitter"></i>
            </button>
        </div>
 
        <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 Copyright:
            <a class="text-white" href="#">UserPost Using Laravel 12</a>
        </div>
    </footer>
</body>
</html>