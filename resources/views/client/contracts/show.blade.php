@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Détails du contrat #{{ $contract->id }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Type de contrat : {{ $contract->contract_type }}</h5>
            <p class="card-text">
                <strong>Date de début : </strong>{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}<br>
                <strong>Date de fin : </strong>{{ $contract->end_date ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : 'Indéfinie' }}<br>
                <strong>Date de création : </strong>{{ \Carbon\Carbon::parse($contract->created_at)->format('d/m/Y H:i') }}<br>
                <strong>Date de dernière modification : </strong>{{ \Carbon\Carbon::parse($contract->updated_at)->format('d/m/Y H:i') }}
            </p>
            <a href="{{ route('client.contracts.index') }}" class="btn btn-secondary">Retour à mes contrats</a>
        </div>
    </div>
</div>
@endsection
