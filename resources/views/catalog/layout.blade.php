<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 @if (isset($title)) | {{ $title }} @endif</title>
    <meta  name="description" content="@if(isset($description)) {{ $description }} @endif" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/catalog/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
   <header class="text-white">

    <div class="container">

        <div class="header-menu">

        <div class="logo">
            <a href="{{ URL('/') }}">
                <img src="{{ asset('images/logo.png') }}" class="img-fluid float-start" />
            </a>
        </div>

       <div class="arama">
        <form id="search-form" action="{{ route('search') }}" method="GET">
        <div class="input-group input-group-md">
            <input type="text" name="q" class="form-control" value="{{request()->query('q')}}" placeholder="Search">
            <div class="input-group-append">
               <button type="submit"  class="btn btn-primary">Search
               </button>
           </div>
        </div>
    </form>
       </div>

       <div class="uye">
            @guest
            <a class="btn btn-outline-primary me-2 {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
            <a class="btn btn-warning {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
            @else

                    <a class="btn btn-primary me-2" href="{{ route('dashboard') }}">
                        {{ Auth::user()->name }}
                    </a>

                        <a class="btn btn-warning" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        >Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>


            @endguest
        </ul>
       </div>

      </div>

 </div>
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
