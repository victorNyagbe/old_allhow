@extends('layout.sellers.app')

@section('content')

    <div class="container">
        <div class="row mt-5"></div>
        <div class="row mt-5">
            <div class="col-12 col-md-6">
                @if ($errors->any())
                    <ul class="alert alert-danger alert-dismissible list-unstyled fade show mb-3" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </ul>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                <form action="{{ route('sellers.register') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" placeholder="nom" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="adresse électronique" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control" placeholder="mot de passe">
                        </div>
                        <div class="col">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="confirmer le mot de passe">
                        </div>   
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-green float-right">Devenir vendeur</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <h2 class="bg-danger mt-5 white-text text-center py-2 mt-md-0">AllhowPDF - Vendeur</h2>
                <p class="mt-3">
                    Devenir vendeur de AllhowPDF est si simple et pas du tout complexe. Il faut juste
                    créer un compte ci-contre et voilà amigo vous êtes maintenat un vendeur sur 
                    AllhowPDF. Vous êtes payé sur chaque pdf téléchargé dont vous en êtes l'auteur.
                    De ce fait allhowpdf te permet de gagner de l'argent.

                    <blockquote class="blockquote">
                        <p>AllhowPDF, le comment de toute chose</p>
                        <footer class="blockquote-footer">L'équipe AllhowPDF</footer>
                    </blockquote>
                </p>
            </div>
        </div>
    </div>
    
@endsection
