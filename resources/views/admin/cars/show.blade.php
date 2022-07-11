@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <img class="card-img-top" src="{{ $car->image }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{ $car->brand }} {{ $car->model }}</h2>
                    <h4>Categoria: {{ $car->category ? $car->category->name : 'nessuna' }}</h4>
                    <p>slug: {{ $car->slug }}</p>
                    <p>CC: {{ $car->cc }}</p>

                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}">Modifica</a>
                </div>
            </div>
        </div>
    </div>
@endsection
