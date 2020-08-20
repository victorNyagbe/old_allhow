@extends('layout.sellers.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-8">
                <table class="table table-sm table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>Nom du document</th>
                            <th>Téléchargement</th>
                            <th>Statut</th>
                            <th class="text-center" width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($documents as $document)
                            <tr class="{{ ($document->status == 'En attente') ? 'bg-warning' : (($document->status == 'Approuvé') ? '' : 'bg-danger') }}">
                                <td>{{ $document->nom }}</td>
                                <td class="{{ $document->downloaded == null ? 'text-center' : 'text-right' }}">{{ $document->downloaded == null ? '-' : $document->downloaded }}</td>
                                <td>{{ $document->status }}</td>
                                <td class="text-center">
                                    @if ($document->status == 'Approuvé')
                                        <a href="" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lire</a>
                                    @else
                                        <a class="btn btn-sm btn-info"><i class="fas fa-eye-slash"></i> Lire</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="4">Aucun document n'a été envoyé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection