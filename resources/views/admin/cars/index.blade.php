@extends('layouts.dashboard')

@section('content')
    <div class="row row-cols-3">
        @foreach ($cars as $car)
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{ $car->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                        <a href="{{ route('admin.cars.show', ['car' => $car->id]) }}" class="btn btn-primary">Dettagli</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
