@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Créer un nouveau contrat</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('client.contracts.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="contract_type">Type de contrat</label>
            <input type="text" name="contract_type" class="form-control" value="{{ old('contract_type') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="end_date">Date de fin (optionnelle)</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('client.contracts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
