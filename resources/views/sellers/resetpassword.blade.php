@extends('layout.sellers.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 mt-5">
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

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <center>
                    <img src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" alt="logo allhowpdf" width="150" height="150" class="rounded circle">                 
                </center>
            
            
                <form action="{{ route('sellers.resetPassword') }}" method="post"> 

                    @csrf

                    <div class="form-group">    
                        <input type="text" name="forget_password_code" id="forget_password_code" class="form-control" placeholder="Code de vérification">
                    </div>

                    <div class="form-group">
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="mot de passe">
                    </div>

                    <div class="form-group">
                        <input type="password" autocomplete="false" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="confirmer">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-green btn-block">Valider</button>
                    </div> 

                </form>
            </div>
        </div>
    </div>
@endsection