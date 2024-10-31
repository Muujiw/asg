@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-uppercase fw-bold" style="color: #21618c;">Actualités</h1>

    @if($news->isEmpty())
        <p class="text-muted">Aucune actualité disponible pour le moment.</p>
    @else
        <div class="row">
            @foreach($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <!-- Image de la news -->
                        @if($item->image_url)
                            <img src="{{ asset($item->image_url) }}" class="card-img-top" alt="{{ $item->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title" style="color: #21618c;">{{ $item->title }}</h5>
                            <p class="card-text text-muted">
                                <small>Publié le {{ \Carbon\Carbon::parse($item->publication_date)->format('d/m/Y') }}</small>
                            </p>
                            <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-outline-primary">Lire plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
