@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <p class="text-center d-none d-lg-block" style="font-size: 2.5rem;">Trouvez le comment de toute chose en PDF</>
                <p class="text-center d-none d-lg-block"><small class="text-muted" style="font-size: 18px;">En 2 pages maximum</small></p>
                <p class="text-center d-block d-lg-none" style="font-size: 1.75rem;">Trouvez le comment de toute chose en PDF</p>
                <p class="text-center d-block d-lg-none"><small class="text-muted" style="font-size: 12px;">En 2 pages maximum</small></p>
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

        <?php
            session()->put('identity', '1146');
        ?>

        <div class="row mt-3">
            <div class="col-12">
                <a href="{{ route('visitors.homepdf') }}" class="btn btn-sm z-depth-3"><i class="fa fa-file"></i> PDF</a>
                <a href="{{ route('visitors.home') }}" class="btn btn-sm unique-color white-text"><i class="fa fa-play"></i> Vidéos</a>
            </div>
        </div>

        <div class="row mt-3">
            
            @foreach ($documents as $document)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card z-depth-2">
                        <img src="{{ URL::asset('assets/logos/pdf.jpg') }}" alt="logo all-how" class="card-img-top">
                        <div class="card-body elegant-color">
                            <h5 class="card-title white-text">Comment devenir un entrepreneur....</h5>
                            <span class="float-right white-text"><i class="fas fa-download"></i> 200</span>
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