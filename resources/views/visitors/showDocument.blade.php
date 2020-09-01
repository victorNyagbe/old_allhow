@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8 mt-md-3 mt-lg-0">
                <div class="jumbotron z-depth-3 pt-1">

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
                            <td class="font-weight-bold">{{ $fileType == 'Video' ? $file->taille_video : $file->taille_pdf ." Mo" }}</td>
                        </tr>
                        <tr>
                            <td>Version:</td>
                            <td class="font-weight-bold">{{ $document->version == 'french' ? 'Française' : 'Anglaise' }}</td>
                        </tr>
                        <tr>
                            <td>Téléchargements:</td>
                            <td class="font-weight-bold">{{ $document->downloaded }}</td>
                        </tr>
                    </table>

                    <div class="mt-4 text-center">
                        <a href="" class="btn btn-sm btn white">mettre en panier <i class=" fas fa-shopping-cart"></i></a>
                        <a href="" class="btn btn-sm btn-dark-green">télécharger</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection