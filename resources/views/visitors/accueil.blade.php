@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <p class="text-center d-none d-lg-block" style="font-size: 2.5rem;">Trouvez le comment de toute chose en Vidéos</p>
                <p class="text-center d-none d-lg-block"><small class="text-muted" style="font-size: 18px;">En moins de 5 minutes</small></p>
                <p class="text-center d-block d-lg-none" style="font-size: 1.75rem;">Trouvez le comment de toute chose en Vidéos</p>
                <p class="text-center d-block d-lg-none"><small class="text-muted" style="font-size: 12px;">En moins de 5 minutes</small></p>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-md-8">
                <form action="" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"
                              aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Comment ......." aria-label="Search">
                      </div>
                </form>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="row mt-2">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div> 
        @endif

        <?php
            session()->put('identity', '2294');
        ?>
        <div class="row mt-3">
            <div class="col-12">
                <a href="{{ route('visitors.home') }}" class="btn btn-sm z-depth-2"><i class="fa fa-play"></i> Vidéos</a>
                <a href="{{ route('visitors.homepdf') }}" class="btn btn-sm amber darken-4 white-text"><i class="fa fa-file"></i> PDF</a>
            </div>
        </div>
        <div class="row mt-3">
            
            @foreach ($documents as $document)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card z-depth-2">

                        {{-- <a href="#" class="text-decoration-none uk-inline uk-dark d-none d-md-block">
                            <img src="{{ URL::asset('assets/logos/allhowcomvideoweb.jpg') }}" alt="logo all-how" class="card-img-top">
                            <div class="uk-overlay-default uk-position-cover">
                                <div class="d-flex justify-content-center mt-5">
                                    <i class="fa fa-play-circle fa-3x text-dark"></i>
                                </div>
                            </div>
                        </a> --}}

                        <a href="{{ $document->pathShowDoc() }}" class="view d-none d-md-block">
                            <img src="{{ URL::asset('assets/logos/allhowcomvideoweb.jpg') }}" alt="logo all-how" class="card-img-top img-fluid">
                            <div class="mask flex-center waves-effect waves-light rgba-brown-strong">
                                <i class="fa fa-play-circle fa-3x text-dark"></i>
                            </div>
                        </a>

                        
                        <a href="{{ $document->pathShowDoc() }}" class="view d-block d-md-none">
                            <img src="{{ URL::asset('assets/logos/allhowcomvideoweb.jpg') }}" alt="logo all-how" class="card-img-top img-fluid">
                            <div class="mask flex-center waves-effect waves-light rgba-brown-strong">
                                <i class="fa fa-play-circle fa-5x text-dark"></i>
                            </div>
                        </a>


                        <div class="card-body">
                            <p class="card-title font-weight-bold" title="{{ $document->nom }}">{{ \Illuminate\Support\Str::substr($document->nom, 0, 20) . "..." }}</p>
                            <span class="float-right"><i class="fas fa-download"></i> 200</span>
                            <a href="{{ $document->pathShowDoc() }}" class="btn btn-block green darken-4 white-text d-none d-lg-block">télécharger</a>
                            <a href="{{ $document->pathShowDoc() }}" class="btn btn-block green darken-4 white-text btn-sm d-block d-lg-none">télécharger</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-md-3">
                {{ $documents->links() }}
            </div>
        </div>
    </div>
@endsection