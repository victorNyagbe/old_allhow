@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <table class="table table-sm table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Documents publiés</th>
                            <th>Portefeuille</th>
                            <th>NBTE</th>
                            <th class="text-center" width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sellers as $seller)
                            <tr>
                                <td>{{ $seller->username }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ count(\App\Document::where(['vendeur_id' => $seller->id, 'status' => 1])->get()) }}</td>
                                <td>{{ $seller->wallet . ' $' }}</td>
                                <td>0</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucun vendeur enregistré</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection