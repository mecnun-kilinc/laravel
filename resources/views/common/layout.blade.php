<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 | {{ $metaTitle }}</title>
    <meta  name="description" content="{{ $metaDescription }}" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/catalog/css/custom.css') }}">
</head>
<body>
   <header class="text-white pt-2 pb-4">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand text-black" href="{{ URL('/') }}">Logo</a>
          <div class="text-end">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2 {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                @else  

                     <li class="nav-item">
                        <a class="btn btn-primary me-2" href="{{ route('dashboard') }}">
                            {{ Auth::user()->name }}
                        </a>
                       </li>

                        <li class="nav-item">
                            <a class="btn btn-warning" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>

                @endguest
            </ul>
          </div>
        </div>
    </nav>    
   </header>



    <div class="container  p-3 pt-5 pb-5">
        @yield('content')
    </div>  
    
    
    <footer class="text-white p-3 pt-5 pb-5">
        <div class="container text-center">  
          <p>Footer Block</p>
        </div>
    </footer>   
  
  


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js "></script>

</body>
</html>