@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Contacter l'administration</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
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

    <form action="{{ route('client.tickets.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="subject">Sujet</label>
            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Envoyer</button>
    </form>
</div>
@endsection
