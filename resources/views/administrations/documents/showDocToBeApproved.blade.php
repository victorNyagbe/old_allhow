@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-9 col-12">
                @if ($errors->any())
                    <ul class="alert alert-danger list-unstyled alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </ul>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" aria-label="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('administration.approveDocument') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="docId" id="docId" value="{{ $doc->id }}">
                    <div class="form-group">
                        <label for="docAuthor">Auteur du document: </label>
                        <input id="docAuthor" class="form-control" type="text" name="docAuthor" value="{{ $doc->vendeur->username }}" readonly>
                        <input type="hidden" name="docAuthorId" value="{{ $doc->vendeur_id }}">
                    </div>
                    <div class="form-group">
                        <label for="versionFr" class="font-weight-bold"><em>&bull; Version française</em></label>
                    </div>
                    <div class="form-group">
                        <label for="docNameFr">Nom du document: </label>
                        <input id="docNameFr" class="form-control" type="text" name="docNameFr" value="{{ $doc->nom }}">   
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="docPDFFr">PDF: </label>
                            <input id="docPDFFr" class="form-control" type="file" name="docPDFFr">
                        </div>
                        <div class="col">
                            <label for="docVideoFr">Video: </label>
                            <input type="file" name="docVideoFr" id="docVideoFr" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="versionEn" class="font-weight-bold"><em>&bull; Version anglaise</em></label>
                    </div>
                    <div class="form-group">
                        <label for="docNameEn">Nom du document: </label>
                        <input id="docNameEn" class="form-control" type="text" name="docNameEn" placeholder="le nom du document en anglais....">
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="docPDFEn">PDF: </label>
                            <input id="docPDFEn" class="form-control" type="file" name="docPDFEn">
                        </div>
                        <div class="col">
                            <label for="docVideoEn">Video: </label>
                            <input type="file" name="docVideoEn" id="docVideoEn" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button type="submit" class="btn btn-green">Valider</button>
                        <a href="{{ route('administration.docPending') }}" class="btn btn-light">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection