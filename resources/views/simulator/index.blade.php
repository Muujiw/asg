@extends('layouts.layout')

@section('content')
<div class="container text-white">
    <h1>Simulateur de prime d'assurance</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('simulator.calculate') }}" method="POST">
        @csrf
        <!-- Type d'assurance -->
        <div class="form-group mb-3">
            <label for="insurance_type">Type d'assurance</label>
            <select name="insurance_type" id="insurance_type" class="form-control" required>
                <option value="">Sélectionnez un type d'assurance</option>
                <option value="auto">Assurance Auto</option>
                <option value="habitation">Assurance Habitation</option>
                <option value="sante">Assurance Santé</option>
            </select>
        </div>

        <!-- Âge du client -->
        <div class="form-group mb-3">
            <label for="age">Âge</label>
            <input type="number" name="age" id="age" class="form-control" min="18" max="100" required>
        </div>

        <!-- Durée de la couverture -->
        <div class="form-group mb-3">
            <label for="duration">Durée (années)</label>
            <input type="number" name="duration" id="duration" class="form-control" min="1" max="30" required>
        </div>

        <!-- Couverture -->
        <div class="form-group mb-3">
            <label for="coverage">Type de couverture</label>
            <select name="coverage" id="coverage" class="form-control" required>
                <option value="">Sélectionnez la couverture</option>
                <option value="complete">Couverture complète</option>
                <option value="partielle">Couverture partielle</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Calculer la prime</button>
    </form>
</div>
@endsection
