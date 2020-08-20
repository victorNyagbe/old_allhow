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
                            <th>Taille du document</th>
                            <th>Date de publication</th>
                            <th class="text-center" wifth="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rejectedDocuments as $rejectedDocument)
                            <tr>
                                <td>{{ $rejectedDocument->nom }}</td>
                                <td>{{ $rejectedDocument->vendeur->username }}</td>
                                <td>{{ $rejectedDocument->taille }}</td>
                                <td>{{ $rejectedDocument->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Supprimer</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucun document rejeté</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection