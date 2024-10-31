@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Gestion des contrats</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.contracts.create') }}" class="btn btn-primary mb-3">Créer un nouveau contrat</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-white">ID</th>
                <th class="text-white">Utilisateur</th>
                <th class="text-white">Type de contrat</th>
                <th class="text-white">Date de début</th>
                <th class="text-white">Date de fin</th>
                <th class="text-white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            <tr class="text-white">
                <td >{{ $contract->id }}</td>
                <td>{{ $contract->user->name }}</td>
                <td>{{ $contract->contract_type }}</td>
                <td>{{ $contract->start_date }}</td>
                <td>{{ $contract->end_date ?? 'Indéfinie' }}</td>
                <td>
                    <a href="{{ route('admin.contracts.edit', $contract->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                    <form action="{{ route('admin.contracts.destroy', $contract->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
