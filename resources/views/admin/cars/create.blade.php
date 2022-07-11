@extends('layouts.dashboard')

@section('content')
    <h1>Crea un nuovo veicolo</h1>

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
            <input type="text" class="form-control" name="brand" id="brand" value="{{ old('brand') }}">
        </div>

        <div class="form-group">
            <label for="model">Modello</label>
            <input type="text" class="form-control" name="model" id="model" value="{{ old('model') }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cc">Cilindrata</label>
            <input type="text" class="form-control" name="cc" id="cc" value="{{ old('cc') }}">
        </div>

        <div class="form-group">
            <label for="doors">Porte</label>
            <input type="number" class="form-control" name="doors" id="doors" value="{{ old('doors') }}">
        </div>

        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control" name="image" id="image" value="{{ old('image') }}">
        </div>

        <div class="form-group mb-4">
            <label for="registration_date">Data di immatricolazione</label>
            <input type="date" class="form-control" name="registration_date" id="registration_date"
                value="{{ old('registration_date') }}">
        </div>

        <button class="btn btn-primary">Salva</button>
    </form>
@endsection
