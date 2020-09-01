@extends('layouts.app')

@section('content')
    <div class="container ubuntu">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <thead class="red lighten-1 white-text">
                      <tr>
                          <th>Nom du document</th>
                          <th>Auteur du document</th>
                          <th>Taille</th>
                          <th>Date de publication</th>
                          <th class="text-center" colspan="2" width="100">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($pendingDocuments as $pendingDocument)
                          <tr>
                              <td>{{ $pendingDocument->nom }}</td>
                              <td>{{ $pendingDocument->vendeur->username }}</td>
                              <td>{{ \Illuminate\Support\Str::substr(\App\Fichier::where('document_id', $pendingDocument->id)->value('taille_pdf'), 0, 4) . " Mo" }}</td>
                              <td>{{ $pendingDocument->created_at->format('d-m-Y') }}</td>
                              <td class="text-center">
                                  <form action="{{ route('administration.rejectDocument', $pendingDocument->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('administration.showDocToBeApproved', $pendingDocument->id) }}" class="btn btn-sm btn-info" title="Valider le document"><i class="fas fa-check"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm" title="Rejeter le document" onclick="return confirm('Veuillez confirmer le rejet du document {{ $pendingDocument->nom }} de l\'auteur {{ $pendingDocument->vendeur->username }}')"><i class="fas fa-times"></i></button>
                                  </form>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="5" class="text-center">Aucun document en attente</td>
                          </tr>
                      @endforelse
                      
                  </tbody>
              </table>
              </div>
            </div>
        </div>
    </div>
@endsection