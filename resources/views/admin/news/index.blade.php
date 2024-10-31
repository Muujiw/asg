@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1 class="mb-4">Gestion des News</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Créer une nouvelle News</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date de publication</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->publication_date }}</td>
                <td>
                    @if($item->image_url)
                        <img src="{{ asset($item->image_url) }}" alt="Image de la news" width="100">
                    @else
                        Aucun(e)
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-primary">Modifier</a>

                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline">
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
