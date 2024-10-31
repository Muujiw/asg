@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Modifier l'utilisateur</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3 text-white">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group mb-3 text-white">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group mb-3 text-white">
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
        </div>

        <div class="form-group mb-3 text-white">
            <label for="last_name">Nom de famille</label>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
        </div>

        <div class="form-group mb-3 text-white">
            <label for="role">Rôle</label>
            <input type="text" name="role" class="form-control" value="{{ $user->role }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
