@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <img class="card-img-top" src="{{ $car->image }}" alt="Card image cap">
                <div class="card-body">
                    <p>Creato il: {{ $car->created_at->format('d F Y H:i') }}</p>
                    <p>Modificato: {{ $updated_mins_ago < 60 ? $updated_mins_ago . ' min fa' : $car->updated_at->format('d F Y H:i') }}</p>
                    <h2 class="card-title">{{ $car->brand }} {{ $car->model }}</h2>
                    <h4>Categoria: {{ $car->category ? $car->category->name : 'nessuna' }}</h4>
                    <p>slug: {{ $car->slug }}</p>
                    <p>CC: {{ $car->cc }}</p>


                    <h5>Optionals:</h5>
                    <ul>
                        @forelse ($car->optionals as $optional)
                            <li> {{ $optional->name }} </li>
                        @empty
                            <li>nessuno</li>
                        @endforelse

                    </ul>

                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}">Modifica</a>
                </div>
            </div>
        </div>
    </div>
@endsection
