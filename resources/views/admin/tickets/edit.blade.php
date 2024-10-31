@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Répondre au ticket</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $ticket->subject }}</h5>
            <p class="card-text"><strong>Message de l'utilisateur :</strong> {{ $ticket->message }}</p>
            @if($ticket->response)
                <p><strong>Réponse de l'administration :</strong> {{ $ticket->response }}</p>
            @endif
        </div>
    </div>

    <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="response">Réponse de l'administration</label>
            <textarea name="response" id="response" class="form-control" rows="5" required>{{ old('response', $ticket->response) }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_resolved" class="form-check-input" id="is_resolved" {{ $ticket->is_resolved ? 'checked' : '' }}>
            <label class="form-check-label" for="is_resolved">Marquer comme résolu</label>
        </div>

        <button type="submit" class="btn btn-success">Envoyer la réponse</button>
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
