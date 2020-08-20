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
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/fontawesome.css') }}">
    <title>allhowpdf | register</title>
    <style>
        .allhowpdf-color {
            background-color: #ff3c3c;
        }

        body {
            font-family: ubuntu;
        }

        @font-face {
            font-family: ubuntu;
            src: url(fonts/Ubuntu-Light.ttf);
        }
    </style>
</head>
<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark allhowpdf-color">
    
      <!-- Navbar brand -->
      <a href="" class="navbar-brand">
        <img class="rounded-circle" src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" height="50px;" width="50px;">
      </a>
      
      <span class="navbar-text white-text d-block d-lg-none">
        all-how.com
      </span>
      
      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="basicExampleNav">
    
        <!-- Links -->
        @if (!session()->has('id'))
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('visitors.home') }}">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        @else
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('sellers.home') }}">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="documentsDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Documents</a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="documentsDropdown">
                <a class="dropdown-item" href="{{ route('sellers.documents') }}">Mes documents</a>
                <a class="dropdown-item" href="{{ route('sellers.sendDocForm') }}">Envoyer un document</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#!" class="nav-link" data-toggle="modal" data-target="#walletModal">Portefeuille</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            @if (session()->get('id'))
              <li class="nav-item dropdown">
                <div style="width: 45px; height: 45px; overflow: hidden;" class="rounded-circle">
                  @if (session()->get('profile') == null)
                    <div style="width: 45px; height: 45px; line-height: 40px;"  style="cursor: pointer;" class="bg-primary text-center" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <b class="white-text" style="font-size: 1.5rem;">{{ \Illuminate\Support\Str::substr(session()->get('nom'), 0, 1) }}</b>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                      <a href="{{ route('sellers.updateProfileForm') }}" class="dropdown-item">Mon profil</a>
                      <a href="{{ route('sellers.logout') }}" class="dropdown-item">Deconnexion</a>
                    </div>
                  @else
                    <img src="{{ URL::asset('storage/' . session()->get('profile')) }}" style="cursor: pointer;" alt="profile" width="100%" id="profilDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilDropdown">
                      <a href="{{ route('sellers.updateProfileForm') }}" class="dropdown-item">Mon profil</a>
                      <a href="{{ route('sellers.logout') }}" class="dropdown-item">Deconnexion</a>
                    </div>
                  @endif
                </div>
              </li>
            @endif 
          </ul>
        @endif
        @if (!session()->has('id'))
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="login-seller" class="nav-link" class="nav-link">Se connecter</a>
            </li>
          </ul>
        @endif
      </div>
      <!-- Collapsible content -->  
    </nav>

    @yield('content')

    <div class="modal fade" tabindex="-1" role="dialog" id="walletModal" aria-labelledby="walletModalExample" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="walletModalExample"><i class="fas fa-wallet"></i> Mon portefeuille</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Vous avez <strong>{{ session()->get('wallet') . ' $' }}</strong> dans votre portefeuille</p>
          </div>
        </div>
      </div>
    </div>
    
    <script src="{{ URL::asset('mdb/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/mdb.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/popper.js') }}"></script>
</body>
</html>