@extends('cart.master')

@section('content')
    <div class="row justify-content-center mt-5">
        @if (Cart::count() > 0)
            <div class="col-12">
                <table class="table table-responsive table-sm table-striped">
                    <thead class="light-blue white-text text-center">
                        <tr>
                            <th>Document</th>
                            <th>Auteur</th>
                            <th width="100">Fichier</th>
                            <th>Langue</th>
                            <th>Quantité</th>
                            <th width="100">Prix</th>
                            <th width="100" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        @foreach($documents as $document)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div><img src="{{ URL::asset('assets/logos/allhowcom1.jpg') }}" alt="logo" width="50"></div>
                                        <div class="flex-grow-1 ml-3">{{ \Illuminate\Support\Str::substr($document->model->nom, 0, -4) }}</div>
                                    </div></td>
                                <td>{{ $document->model->vendeur->username }}</td>
                                <td>{{ \Illuminate\Support\Str::substr($document->model->nom, -1, 4) == '2294' ? 'Vidéo' : 'PDF' }}</td>
                                <td>{{ $document->model->version == 'french' ? 'Française' : 'Anglaise' }}</td>
                                <td class="text-right">1</td>
                                <td class="text-right">1 $</td>
                                <td class="text-center">
                                    <form action="{{ route('visitors.cartDestroyDoc', $document->rowId) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger py-1 px-3 mt-0"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <p>Votre montant total s'élève à <strong class="font-weight-bold">{{ Cart::total() . "$" }}</strong></p>
            </div>
        @else
            <div class="col-12 col-md-8 mt-4">
                <div class="jumbotron text-center">
                    <p>Votre panier est vide <i class="fas fa-shopping-basket"></i></p>
                </div>
            </div>
        @endif
    </div>
@endsection