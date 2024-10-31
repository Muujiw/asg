@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Créer une News</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Contenu</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="publication_date">Date de publication</label>
            <input type="date" name="publication_date" class="form-control" value="{{ old('publication_date') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="keywords">Mots-clés</label>
            <input type="text" name="keywords" class="form-control" value="{{ old('keywords') }}">
        </div>

        <div class="form-group mb-3">
            <label for="image">Image (optionnelle)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
