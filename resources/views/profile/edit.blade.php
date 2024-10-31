@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-uppercase fw-bold" style="color: #21618c;">Gérer votre profil</h1>

    <!-- Section pour mettre à jour le profil -->
    <section class="mb-5 p-4 bg-light shadow rounded">
        <header>
            <h2 class="text-lg font-medium" style="color: #21618c;">Informations du profil</h2>
            <p class="text-muted">Mettez à jour votre nom et votre adresse email.</p>
        </header>

        <form method="post" action="{{ route('profile.update') }}" class="mt-4">
            @csrf
            @method('patch')

            <!-- Nom -->
            <div class="form-group mb-3">
                <label for="name" class="form-label" style="color: #21618c;">Nom</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus>
                @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email" class="form-label" style="color: #21618c;">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror

                <!-- Vérification d'email non confirmée -->
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2 text-muted">
                        <p>Votre adresse email n'est pas vérifiée. 
                            <button form="send-verification" class="btn btn-link p-0">Cliquez ici pour renvoyer l'email de vérification.</button>
                        </p>
                    </div>
                @endif
            </div>

            <!-- Bouton Sauvegarder -->
            <button type="submit" class="btn btn-primary" style="background-color: #21618c; border-color: #21618c;">Sauvegarder les modifications</button>
        </form>
    </section>

    <!-- Section pour mettre à jour le mot de passe -->
    <section class="mb-5 p-4 bg-light shadow rounded">
        <header>
            <h2 class="text-lg font-medium" style="color: #21618c;">Mettre à jour le mot de passe</h2>
            <p class="text-muted">Utilisez un mot de passe long et sécurisé.</p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-4">
            @csrf
            @method('put')

            <!-- Mot de passe actuel -->
            <div class="form-group mb-3">
                <label for="current_password" class="form-label" style="color: #21618c;">Mot de passe actuel</label>
                <input id="current_password" name="current_password" type="password" class="form-control" required>
                @error('current_password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Nouveau mot de passe -->
            <div class="form-group mb-3">
                <label for="password" class="form-label" style="color: #21618c;">Nouveau mot de passe</label>
                <input id="password" name="password" type="password" class="form-control" required>
                @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Confirmation du nouveau mot de passe -->
            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label" style="color: #21618c;">Confirmer le nouveau mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                @error('password_confirmation') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Bouton Sauvegarder -->
            <button type="submit" class="btn btn-primary" style="background-color: #21618c; border-color: #21618c;">Mettre à jour le mot de passe</button>
        </form>
    </section>

    <!-- Section pour supprimer le compte -->
    <section class="p-4 bg-light shadow rounded">
        <header>
            <h2 class="text-lg font-medium" style="color: #21618c;">Supprimer le compte</h2>
            <p class="text-muted">Une fois supprimé, toutes vos données seront perdues. Téléchargez ce que vous souhaitez conserver avant de continuer.</p>
        </header>

        <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
            @csrf
            @method('delete')

            <!-- Mot de passe pour confirmer la suppression -->
            <div class="form-group mb-3">
                <label for="delete_password" class="form-label" style="color: #21618c;">Mot de passe</label>
                <input id="delete_password" name="password" type="password" class="form-control" placeholder="Mot de passe" required>
                @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Bouton Supprimer le compte -->
            <button type="submit" class="btn btn-danger">Supprimer le compte</button>
        </form>
    </section>
</div>
@endsection
