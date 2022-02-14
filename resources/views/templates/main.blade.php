<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body class="antialiased">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : ''  }} " href="/"  >Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('items') ? 'active' : ''  }}" href="/items">Items</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('customers') ? 'active' : ''  }}" href="/customers">Customers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('sales') ? 'active' : ''  }}" href="/sales">Transaction</a>
                  </li>
                </ul>
                @auth
                <span class="navbar-text">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link btn btn-light text-dark" type="submit">Logout</button>
                    </form>
                </span>
                @else 

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/register"> Register </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"> Login </a>
                    </li>
                </ul>
                @endauth
              </div>
            </div>
          </nav>
        <div class="container mt-3">
            @yield('content')
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</html>
