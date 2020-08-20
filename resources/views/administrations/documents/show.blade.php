@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-9 col-12">
                <textarea name="pendingText" id="pendingText" cols="30" rows="10">
                    {{ asset('storage/' . $doc) }}
                </textarea>
            </div>
        </div>
    </div>
@endsection