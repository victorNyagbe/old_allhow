@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <p class="text-center d-none d-lg-block" style="font-size: 2.5rem;">Trouvez le comment de toute chose en Vidéos / PDF <small class="text-muted" style="font-size: 18px;">En 2 pages maximum</small></p>
                <p class="text-center d-block d-lg-none" style="font-size: 1.75rem;">Trouvez le comment de toute chose en Vidéos / PDF <small class="text-muted" style="font-size: 12px;">En 2 pages maximum</small></p>
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
        <div class="row mt-5">
            
            @for ($i = 0; $i < 8; $i++)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="jumbotron py-2 z-depth-2">
                        <img src="{{ URL::asset('assets/logos/allhowcomweb.jpg') }}" alt="logo all-how" width="100%;">
                        <div>
                            <p>Comment devenir un entrepreneur....</p>
                        </div>
                        <div>
                            <a href="" class="btn btn-block green darken-4 white-text d-none d-lg-block">télécharger</a>
                            <a href="" class="btn btn-block green darken-4 white-text btn-sm d-block d-lg-none">télécharger</a>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
@endsection