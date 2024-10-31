@extends('layouts.layout')

@section('content')
<div class="container">
    @if(Auth::user()->role == 'admin')
    <h1 class="mb-4 text-white">Tableau de bord administrateur</h1>
        <a class="btn btn-primary mb-3" href="{{ route('admin.contracts.index') }}">Gestion des contrats</a>
        <a class="btn btn-primary mb-3" href="{{ route('admin.users.index') }}">Gestion des utilisateurs</a>
        <a class="btn btn-primary mb-3" href="{{ route('admin.quote_requests.index') }}">Gestion des demandes de devis</a>
        <a class="btn btn-primary mb-3" href="{{ route('admin.tickets.index') }}">Gestion des tickets</a>
        <a class="btn btn-primary mb-3" href="{{ route('admin.news.index') }}">Gestion des actualités</a>
    @endif

     <a href="{{ route('client.tickets.create') }}" class="btn btn-info mb-3">
        <i class="fas fa-envelope"></i> Contacter l'administration
    </a>

    <h1 class="mb-4 text-white">Mes contrats</h1>

    <!-- Bouton pour demander un devis -->
    <a href="{{ route('client.quote_requests.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-file-alt"></i> Demander un devis
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($contracts->isEmpty())
        <div class="alert alert-info">
            Vous n'avez pas encore de contrat. 
            <a href="{{ route('client.quote_requests.create') }}" class="btn btn-primary">Demander un devis</a>
        </div>
    @else
    <div class="row">
        @foreach($contracts as $contract)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><strong>Contrat #{{ $contract->id }}</strong> - {{ $contract->contract_type }}</h5>
                    <p class="card-text">
                        Date de début : <span class="badge bg-primary">{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</span><br>
                        Date de fin : <span class="badge bg-secondary">{{ $contract->end_date ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : 'Indéfinie' }}</span>
                    </p>
                    <p>
                        <a href="{{ route('client.contracts.view', $contract->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Voir les détails
                        </a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
