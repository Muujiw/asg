@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Gestion des demandes de devis</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr class="text-white">
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Type de contrat</th>
                <th>Date de début</th>
                <th>Détails</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quoteRequests as $quoteRequest)
            <tr class="text-white">
                <td>{{ $quoteRequest->id }}</td>
                <td>{{ $quoteRequest->user->name }}</td>
                <td>{{ $quoteRequest->contract_type }}</td>
                <td>{{ $quoteRequest->start_date }}</td>
                <td>{{ $quoteRequest->details ?? 'Aucun détail' }}</td>
                <td>
                    @if($quoteRequest->is_processed)
                        <span class="badge bg-success">Traité</span>
                    @else
                        <span class="badge bg-warning">En attente</span>
                    @endif
                </td>
                <td>
                    @if(!$quoteRequest->is_processed)
                    <form action="{{ route('admin.quote_requests.process', $quoteRequest->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-success">Marquer comme traité</button>
                    </form>
                    @endif

                    <form action="{{ route('admin.quote_requests.destroy', $quoteRequest->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
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
