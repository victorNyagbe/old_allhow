@extends('layout.sellers.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6 mt-md-4">

                @if ($errors->any())
                    <ul class="list-unstyled alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </ul>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('sellers.sendDoc') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <input type="text" name="document" id="document" class="form-control" placeholder="le nom du document" value="{{ old('document') }}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="fichier_doc" id="fichier_doc" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Envoyer le document</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
@endsection