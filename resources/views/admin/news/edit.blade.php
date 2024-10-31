@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Modifier la News</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Contenu</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $news->content }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="publication_date">Date de publication</label>
            <input type="date" name="publication_date" class="form-control" value="{{ $news->publication_date }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="keywords">Mots-clés</label>
            <input type="text" name="keywords" class="form-control" value="{{ $news->keywords }}">
        </div>

        <div class="form-group mb-3">
            <label for="image">Image actuelle</label>
            @if($news->image_url)
                <div class="mb-2">
                    <img src="{{ asset($news->image_url) }}" alt="Image de la news" width="200">
                </div>
            @else
                <p>Aucune image actuelle</p>
            @endif

            <label for="image">Changer l'image (optionnel)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
