@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <a href="{{ route('administration.docApproved') }}" class="text-decoration-none">
                    <div class="card green darken-3">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <i class="fas fa-check fa-4x white-text"></i>
                                    </td>
                                    <td class="text-right">
                                        <div class="white-text">
                                            Documents approuvés
                                            <h3 class="m-0 p-0">{{ $countApprovedDocuments }}</h3>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <a href="{{ route('administration.docPending') }}" class="text-decration-none">
                    <div class="card orange">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <i class="fas fa-ban fa-4x white-text"></i>
                                    </td>
                                    <td class="text-right">
                                        <div class="white-text">
                                            Documents en attente
                                            <h3 class="m-0 p-0">{{ $countPendingDocuments }}</h3>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <a href="{{ route('administration.docRejected') }}" class="text-decoration-none">
                    <div class="card red">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <i class="fas fa-times fa-4x white-text"></i>
                                    </td>
                                    <td class="text-right">
                                        <div class="white-text">
                                            Documents rejetés
                                            <h3 class="m-0 p-0">{{ $countRejectedDocuments }}</h3>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <a href="{{ route('administration.listSellers') }}" class="text-decoration-none">
                    <div class="card blue">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <i class="fas fa-users fa-4x white-text"></i>
                                    </td>
                                    <td class="text-right">
                                        <div class="white-text">
                                            Vendeurs
                                            <h3 class="m-0 p-0">{{ $countSellers }}</h3>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <a href="" class="text-decoration-none">
                    <div class="card purple darken-3">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <i class="fas fa-download fa-4x white-text"></i>
                                    </td>
                                    <td class="text-right">
                                        <div class="white-text">
                                            Téléchargements
                                            <h3 class="m-0 p-0">10k+</h3>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <a href="" class="text-decoration-none">
                    <div class="card teal darken-4">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <i class="fas fa-play fa-4x white-text"></i>
                                    </td>
                                    <td class="text-right">
                                        <div class="white-text">
                                            Vidéos
                                            <h3 class="m-0 p-0">100</h3>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </a>      
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <p class="text-center font-weight-bolder text-uppercase" style="opacity: 0.5; font-size: 2rem;">All-How Administration Panel</p>
            </div>
        </div>
    </div>
@endsection