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
            src: url(fonts/Ubuntu-Light.ttf)
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row mt-5"></div>
        <div class="row mt-5"></div>
        <div class="row justify-content-center mt-5">
            <div class="col-10 col-md-6 border pb-5 bg-light pt-3">
                <p class="red white-text text-center font-weigt-bold" style="font-size: 2rem;">All-how | Administration</p>
                <p class="text-center font-weight-bolder text-danger">Connexion</p>
                <form action="{{ route('administration.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="admin-mail">E-mail: </label>
                        <input id="admin-mail" class="form-control" type="text" name="admin-mail" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="admin-password">Mot de passe: </label>
                        <input id="admin-password" class="form-control" type="password" name="admin-password" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="{{ URL::asset('mdb/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('mdb/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('fontawesome/js/all.js') }}"></script>
</body>
</html>