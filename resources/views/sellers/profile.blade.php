@extends('layout.sellers.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <ul class="alert alert-danger alert-dimissible list-unstyled fade show mb-3" role="alert">
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
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('sellers.updateProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username">Nom: </label>
                        <input id="username" class="form-control" type="text" name="username" value="{{ $vendeur->username }}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail: </label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ $vendeur->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="profile">Image: </label>
                        <input id="profile" class="form-control" type="file" name="profile">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Modifier</button>
                        <a href="{{ route('sellers.home') }}" class="btn btn-md btn-light">Annuler</a>
                    </div>
                </form>
            </div>          
            @if (session()->get('profile') != null)
                <div class="col-12 col-md-4">
                    <center>
                        <img src="{{ URL::asset('storage/'. session()->get('profile')) }}" alt="Photo de profil de {{ session()->get('nom') }}"> 
                    </center>
                    <p class="text-center font-weight-bold text-uppercase">{{ session()->get('nom') }}</p>
                </div>
                
            @endif
        </div>
    </div>
@endsection