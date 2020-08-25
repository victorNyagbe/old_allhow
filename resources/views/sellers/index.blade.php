@extends('layout.sellers.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('new-seller'))
                    <div class="jumbotron fade show mt-4 text-center" role="alert">
                        {{ $message }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                <div class="card blue">
                    <div class="card-body z-depth-2">
                        <table width="100%">
                            <tr>
                                <td>
                                    <i class="fas fa-book fa-4x white-text"></i>
                                </td>
                                <td class="text-right">
                                    <div class="white-text">
                                        Documents
                                        <h2 class="m-0 p-0">{{ $countDocument }}</h2>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> 
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                <div class="card red">
                    <div class="card-body z-depth-2">
                        <table width="100%">
                            <tr>
                                <td>
                                    <i class="fas fa-wallet fa-4x white-text"></i>
                                </td>
                                <td class="text-right">
                                    <div class="white-text">
                                        portefeuille
                                        <h2 class="m-0 p-0">{{ session()->get('wallet') . ' $' }}</h2>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> 
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                <div class="card orange">
                    <div class="card-body z-depth-2">
                        <table width="100%">
                            <tr>
                                <td>
                                    <i class="fas fa-download fa-4x white-text"></i>
                                </td>
                                <td class="text-right">
                                    <div class="white-text">
                                        Téléchargements
                                        <h2 class="m-0 p-0">
                                            @if ($documentsDownloaded == null)
                                                Aucun
                                            @else
                                                {{ $documentsDownloaded }}
                                            @endif
                                        </h2>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
        <div class="row-justify-content-center mt-5">
            <p class="text-center text-muted text-uppercase" style="font-size: 2em; opacity: 0.6;">plateforme allhow</p>
        <p class="text-center text-muted text-uppercase" style="font-size: 2em; opacity: 0.6;">panel de {{ session()->get('nom') }}</p>
        </div>
    </div>
@endsection