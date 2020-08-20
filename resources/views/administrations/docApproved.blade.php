@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <table class="table table-sm table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>Nom du document</th>
                            <th>Auteur du document</th>
                            <th>Téléchargements</th>
                            <th>Revenu du document</th>
                            <th>Date de publication</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($approvedDocuments as $approvedDocument)
                            <tr>
                                <td>{{ $approvedDocument->nom }}</td>
                                <td>{{ $approvedDocument->vendeur->username }}</td>
                                <td>{{ $approvedDocument->downloaded }}</td>
                                <td>{{ '0 $' }}</td>
                                <td>{{ $approvedDocument->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucun document approuvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection