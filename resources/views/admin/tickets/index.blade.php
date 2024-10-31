@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Gestion des tickets</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped text-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Sujet</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr class="text-white">
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->user->name }}</td>
                <td>{{ $ticket->subject }}</td>
                <td>
                    @if($ticket->is_resolved)
                        <span class="badge bg-success">Résolu</span>
                    @else
                        <span class="badge bg-warning">En attente</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-sm btn-info">Répondre</a>

                    <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?');">
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
