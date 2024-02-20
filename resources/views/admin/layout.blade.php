<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Admin</title>
    <meta  name="description" content="Admin" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('/backend/css/next-sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.0/examples/sidebars/sidebars.css" />
</head>
<body class="app">

    <div class="sidebar shadow-sm">

        <div class="d-flex flex-column flex-shrink-0 text-white p-3" style="background-color: blue">
          <div class="sidebar-logo">
            <div class="d-flex align-items-center flex-nowrap">
                <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" href="/admin" aria-label="Bootstrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="bi me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
                    <span class="fs-4">Sidebar</span>
                </a>
                <br>
                <div class="mobile-toggle sidebar-toggle" style="margin-top: -10px;width:100%;text-align:right">
                  <a href="/admin" class="text-decoration-none ">
                    <i class="far fa-times-circle text-white"></i>
                  </a>
                </div>
            </div>
          </div>

          <ul class="sidebar-menu scrollable position-relative pt-3">

            <li class="nav-item dropdown">
                <a class="nav-link wave-effect" href="{{ url('/admin') }}">
                <span class="icon-holder">
                  <i class="fas fa-home"></i>
                </span>
                <span class="title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link wave-effect" href="{{ url('/admin/article') }}">
                <span class="icon-holder">
                  <i class="fas fa-file"></i>
                </span>
                <span class="title">Articles</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link wave-effect" href="{{ url('/admin/reviews') }}">
                <span class="icon-holder">
                  <i class="far fa-star"></i>
                </span>
                <span class="title">Reviews</span>
              </a>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link wave-effect" href="{{ url('/admin/members') }}">
                <span class="icon-holder">
                  <i class="fas fa-user"></i>
                </span>
                <span class="title">Members</span>
              </a>
            </li>

          </ul>
        </div>
      </div>


          <div class="container-wide">
          <nav class="navbar navbar-expand navbar-light shadow-sm bg-light p-3">
          <ul class="navbar-nav me-auto">
              <li class="nav-item active">
                  <button type="button" id="sidebar-toggle" class="sidebar-toggle btn btn-link">
                      <i class="fas fa-bars"></i>
                  </button>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto">

            @if (Auth::user())
            <li class="nav-item">
            <a class="btn btn-primary me-2" href="{{ url('/admin/dashboard') }}">
                {{ Auth::user()->name }}
            </a>
            </li>

            <li class="nav-item">
              <a class="btn btn-warning" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                >Logout</a>
            </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @endif
          </ul>
         </nav>



      <div class="m-3">
        @yield('content')
      </div>
    </div>

          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js "></script>
          <script src="{{ asset('/backend/js/perfect-scrollbar.min.js') }}"></script>
          <script src="{{ asset('/backend/js/next-sidebar.js') }}"></script>

          <script>
            $(".button.close").slideUp(200, function() {
                $(this).alert('close');
            });
        </script>
</body>
</html>
