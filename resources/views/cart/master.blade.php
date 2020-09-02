<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.lite.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/fontawesome.css') }}">
    <style>
        .allhowpdf-color {
            background-color: #ff3c3c;
        }

        body {
            font-family: ubuntu;
        }

        @font-face {
            font-family: ubuntu;
            src: url("{{ URL::asset('fonts/Ubuntu-Light.ttf') }}");
        }
    </style>
    <title>All-How | Panier</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark allhowpdf-color">
    
        <!-- Navbar brand -->
        <a href="{{ route('visitors.home') }}" class="navbar-brand">
          <img class="rounded-circle" src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" height="50px;" width="50px;">
        </a>
        
        <span class="navbar-text white-text text-center d-block d-lg-none">
          All-how.com
        </span>
  
        <span class=" navbar-text d-block d-lg-none">
          <a href="">
            <i class="fas white-text fa-shopping-cart">
              @if (Cart::count() > 0)
                <span class="badge badge-pill badge-light">0</span>
              @endif
            </i>
          </a>
        </span>
        
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
      
          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('visitors.home') }}">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <span class="navbar-text white-text my-0 py-0 d-none d-lg-block">All-how.com</span>
          <ul class="navbar-nav ml-auto">
  
              <li class="nav-item">
                <a href="" class="nav-link d-none d-lg-block">
                  <i class="fas white-text fa-shopping-cart">
                    @if (Cart::count() > 0)
                      <span class="badge badge-pill badge-light">0</span>
                    @endif
                  </i>
                </a>
              </li>
          </ul>
        </div>
        <!-- Collapsible content -->  
      </nav>

      <div class="container">
          @yield('content')
      </div>
  
    <script src="{{ URL::asset('mdb/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/mdb.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/popper.js') }}"></script>
</body>
</html>