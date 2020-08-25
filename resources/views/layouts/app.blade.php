<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.lite.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/fontawesome.css') }}">
    <title>AllhowPDF | Admin</title>
    <style>
        body {
            font-family: ubuntu, sans-serif;
        }

        @font-face {
            font-family: ubuntu;
            src: url("{{ URL::asset('fonts/Ubuntu-Light.ttf') }}");
        }
    </style>
    @yield('css')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark red">
    
        <!-- Navbar brand -->
        <a href="" class="navbar-brand">
          <img class="rounded-circle" src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" height="50px;" width="50px;">
        </a>
        
        <span class="navbar-text white-text d-block d-lg-none">
          allhowpdf.com
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
              <a class="nav-link" href="{{ route('administration.dashboard') }}"><i class="fas fa-snowflake"></i> Tableau de bord
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fas fa-home"></i> Accueil</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('administration.docApproved') }}" class="nav-link"><i class="fas fa-check"></i> Approved</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('administration.docPending') }}" class="nav-link"><i class="fas fa-ban"></i> Pending</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('administration.docRejected') }}" class="nav-link"><i class="fas fa-times"></i> Rejected</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fas fa-play"></i> Videos</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('administration.listSellers') }}" class="nav-link"><i class="fas fa-users"></i> Vendeurs</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('administration.registerForm') }}" class="nav-link"><i class="fa fa-user-secret"></i> Inscrire un admin</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a href="" class="text-white" data-toggle="dropdown" id="adminProfileDropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-user-circle fa-2x"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">Profil</a>
                    <a href="#" class="dropdown-item">Deconnexion</a>
                </div>
              </li>
          </ul>
        </div>
        <!-- Collapsible content -->  
    </nav>
    <div class="d-inline-flex mdb-color darken-2">
        <p class="text-white px-4 py-2">Victor NYAGBE <small class="text-success" style="opacity: 0.8; font-size: 0.7rem;">connecté</small></p>
    </div>

      @yield('content')
    
    <script src="{{ URL::asset('mdb/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('fontawesome/js/all.js') }}"></script>
</body>
</html>