@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Demande de devis</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('client.quote_requests.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="contract_type">Type de contrat</label>
            <select name="contract_type" class="form-control" required>
                <option value="">Sélectionnez un type de contrat</option>
                <option value="Assurance Auto">Assurance Auto</option>
                <option value="Assurance Habitation">Assurance Habitation</option>
                <option value="Assurance Santé">Assurance Santé</option>
                <option value="Assurance Vie">Assurance Vie</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="start_date">Date de début souhaitée</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="details">Détails supplémentaires (optionnel)</label>
            <textarea name="details" class="form-control">{{ old('details') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Soumettre la demande</button>
    </form>
</div>
@endsection
