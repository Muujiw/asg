@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Résultat de la simulation</h1>

    <div class="alert alert-info">
        La prime estimée pour votre assurance est : <strong>{{ number_format($premium, 2) }} €</strong>
    </div>

    <a href="{{ route('simulator.index') }}" class="btn btn-secondary">Refaire une simulation</a>
</div>
@endsection
