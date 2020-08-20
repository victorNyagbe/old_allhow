@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <table class="table table-sm table-responsive-sm table-striped">
                    <thead class="red lighten-1 white-text">
                        <tr>
                            <th>Nom du document</th>
                            <th>Auteur du document</th>
                            <th>Taille</th>
                            <th>Date de publication</th>
                            <th class="text-center" width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendingDocuments as $pendingDocument)
                            <tr>
                                <td>{{ $pendingDocument->nom }}</td>
                                <td>{{ $pendingDocument->vendeur->username }}</td>
                                <td>{{ $pendingDocument->taille }}</td>
                                <td>{{ $pendingDocument->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('administration.viewDocPending', $pendingDocument->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lire</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Aucun document en attente</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection