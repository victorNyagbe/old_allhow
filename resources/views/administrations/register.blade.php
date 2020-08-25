@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-4">
                <div class="text-center">
                    <img src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" alt="logo de allhow" class="w-75 img-fluid">
                </div>
                
                <p class="mt-md-5 text-center" style="font-size: 2rem;">Administration Register</p>
            </div>
            <div class="col-12 col-md-8 bg-light py-4">
                <p class="text-center text-danger">Inscription</p>
                <form action="{{ route('administration.register') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="admin-username">Nom: </label>
                        <input id="admin-username" class="form-control" type="text" name="admin-username" placeholder="Nom de l'administrateur">
                    </div>
                    <div class="form-group">
                        <label for="admin-mail">E-mail: </label>
                        <input id="admin-mail" class="form-control" type="email" name="admin-mail" placeholder="Adresse électronique">
                    </div>
                    <div class="form-group">
                        <label for="admin-profile">Image: </label>
                        <input id="admin-profile" class="form-control" type="file" name="admin-profile">
                    </div>

                    <label for="admin-password">Mot de passe: </label>
                    <div class="form-row"> 
                        <div class="col">
                            <input type="password" name="admin-password" id="admin-password" placeholder="mot de passe" class="form-control">
                        </div>
                        <div class="col">
                            <input type="password" name="password-confirmation" id="password-confirmation" placeholder="confirmer" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-sm btn-success float-right">Inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection