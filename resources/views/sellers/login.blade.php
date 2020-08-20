@extends('layout.sellers.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
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
            </div>
            
            <div class="d-flex align-items-center" style="height: 80vh;">
                <form action="{{ route('sellers.login') }}" method="post"> 
                    <center>
                        <img src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" alt="logo allhowpdf" width="150" height="150" class="rounded circle">                 
                    </center>
                    @csrf
                    <div class="form-group">    
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                    </div>  
                    <div class="form-group">    
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe">
                    </div>  
                    <div class="form-group">
                        <button type="submit" class="btn btn-green btn-block">se connecter</button>
                    </div>    
                    <a href="#" class="">Mot de passe oublié</a>                     
                </form>
            </div>
        </div>
    </div>
@endsection