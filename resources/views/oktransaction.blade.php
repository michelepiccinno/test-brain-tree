@extends('layout.layout')
@section('content')

    <div class="container d-flex justify-content-around pt-5">
        <div class="row">
            <div class="col pt-5 text-center">
                <h1>TRANSAZIONE AVVENUTA CON SUCCESSO !</h1>
                <a class="btn btn-info w-50 m-auto mb-1 bg-info mt-5" href="{{ route('products') }}">Torna alla
                    Home</a>
            </div>
        </div>
    </div>
    
@endsection
