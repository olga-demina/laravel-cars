@extends('layouts.dashboard')

@section('content')
    <h1>Modifica autoveicolo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cars.store') }}" method="POST">
        @method('POST')
        @csrf

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" name="brand" id="brand" value="{{ old('brand', $car->brand) }}">
        </div>

        <div class="form-group">
            <label for="model">Modello</label>
            <input type="text" class="form-control" name="model" id="model" value="{{ old('model', $car->model) }}">
        </div>

        <div class="form-group">
            <label for="cc">Cilindrata</label>
            <input type="text" class="form-control" name="cc" id="cc" value="{{ old('cc', $car->cc) }}">
        </div>

        <div class="form-group">
            <label for="doors">Porte</label>
            <input type="number" class="form-control" name="doors" id="doors" value="{{ old('doors', $car->doors) }}">
        </div>

        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control" name="image" id="image" value="{{ old('image', $car->image) }}">
        </div>

        <div class="form-group mb-4">
            <label for="registration_date">Data di immatricolazione</label>
            <input type="date" class="form-control" name="registration_date" id="registration_date" value="{{ old('registration_date', $car->registration_date) }}">
        </div>

        <button class="btn btn-primary">Salva</button>
    </form>
@endsection