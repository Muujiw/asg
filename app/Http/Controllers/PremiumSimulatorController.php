<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiumSimulatorController extends Controller
{
    // Afficher le formulaire de simulation
    public function index()
    {
        return view('simulator.index');
    }

    // Calculer la prime d'assurance
    public function calculate(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'insurance_type' => 'required|string',
            'age' => 'required|integer|min:18|max:100',
            'duration' => 'required|integer|min:1|max:30',
            'coverage' => 'required|string',
        ]);

        // Simuler une formule simple pour calculer la prime
        $base_price = 1000; // Prix de base pour la simulation
        $age_factor = ($request->age > 50) ? 1.5 : 1; // Facteur en fonction de l'âge
        $duration_factor = $request->duration; // Facteur de la durée (années)
        $coverage_factor = ($request->coverage == 'complete') ? 2 : 1.2; // Facteur selon la couverture

        // Calcul de la prime
        $premium = $base_price * $age_factor * $duration_factor * $coverage_factor;

        // Retourner la vue avec la prime calculée
        return view('simulator.result', ['premium' => $premium]);
    }
}
