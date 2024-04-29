@extends('layout.layout')
@section('content')    

        <main>
            <div class="container">
                <div class="row d-flex justify-content-between">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card">
                                <img class="card-img" src="{{ $product->img }}" alt="">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>{{ $product->name }}</h4>
                                    </div>
                                    <div class="card-text">
                                        <h4>{{ $product->description }}</h4>
                                    </div>
                                    <span>{{ $product->price }} €</span>
                                </div>
                                <a class="btn btn-info w-50 m-auto mb-1"
                                    href="{{ route('token', ['id' => $product->id]) }}">ACQUISTA</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

@endsection