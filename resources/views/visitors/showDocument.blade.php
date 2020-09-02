@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8 mt-md-3 mt-lg-0">
                <div class="jumbotron z-depth-3 pt-1">
                    <?php
                        use Illuminate\Support\Str;
                    ?>

                    <center>
                        <img src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" alt="logo allhowpdf" width="150" height="150" class="rounded circle">                 
                    </center>

                    <p class="font-weight-bold h4 mb-4 text-md-center">{{ $document->nom }}</p>

                    <table width="100%">
                        <tr>
                            <td>Auteur:</td>
                            <td class="font-weight-bold">{{ $document->vendeur->username }}</td>
                        </tr>
                        <tr>
                            <td>Type de fichier:</td>
                            <td class="font-weight-bold">{{ $fileType }}</td>
                        </tr>
                        <tr>
                            <td>Taille du fichier:</td>
                            <td class="font-weight-bold">{{ $fileType == 'Video' ? Str::substr($video_taille, 0, 4) : Str::substr($pdf_taille, 0, 4) }} Mo</td>
                        </tr>
                        <tr>
                            <td>Version:</td>
                            <td class="font-weight-bold">{{ $document->version == 'french' ? 'Française' : 'Anglaise' }}</td>
                        </tr>
                        <tr>
                            <td>Téléchargements:</td>
                            <td class="font-weight-bold">{{ $document->downloaded == null ? '-' : $document->downloaded }}</td>
                        </tr>
                    </table>

                    <div class="mt-4 text-center">
                        <form action="{{ route('visitors.cartStoreDoc') }}" method="post">

                            @csrf
                            <input type="hidden" name="document_id" value="{{ $documen->id }}">
                            <input type="hidden" name="fichier" value="{{ $fileTypeIdentity }}">

                            <button type="submit" class="btn btn-sm white">ajouter au panier <i class="fas fa-shopping-cart"></i></button>
                            
                        </form>
                        
                        <a href="" class="btn btn-sm btn-dark-green">télécharger</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection