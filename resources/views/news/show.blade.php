@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h1 class="text-uppercase fw-bold" style="color: #21618c;">{{ $news->title }}</h1>
    <p class="text-muted">
        Publié le {{ \Carbon\Carbon::parse($news->publication_date)->format('d/m/Y') }}
    </p>

    @if($news->image_url)
        <img src="{{ asset($news->image_url) }}" class="img-fluid mb-4" alt="{{ $news->title }}">
    @endif

    <p>{{ $news->content }}</p>

    <a href="{{ route('news.index') }}" class="btn btn-outline-primary mt-4">Retour aux actualités</a>
</div>
@endsection
