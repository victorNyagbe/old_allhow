@extends('cart.master')

@section('content')

    @if ($message = Session::get('success'))
        <div class="row mt-2">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" aria-label="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> 
    @endif

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
                                        <div class="flex-grow-1 ml-3">{{ $document->model->nom }}</div>
                                    </div></td>
                                <td>{{ $document->model->vendeur->username }}</td>
                                <td>{{ \Illuminate\Support\Str::substr($document->name, -4) == '2294' ? 'Vidéo' : 'PDF'  }}</td>
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