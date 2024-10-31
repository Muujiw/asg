<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;

class AdminContractController extends Controller
{
    // Afficher tous les contrats
    public function index()
    {
        $contracts = Contract::with('user')->get(); // Récupère les contrats avec les utilisateurs associés
        return view('admin.contracts.index', compact('contracts'));
    }

    // Afficher le formulaire pour créer un nouveau contrat
    public function create()
    {
        $users = User::all(); // Récupérer tous les utilisateurs pour lier le contrat à un utilisateur
        return view('admin.contracts.create', compact('users'));
    }

    // Enregistrer un nouveau contrat
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'contract_type' => 'required|string|max:191',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Contract::create($request->all());

        return redirect()->route('admin.contracts.index')->with('success', 'Contrat créé avec succès.');
    }

    // Afficher le formulaire d'édition pour un contrat spécifique
    public function edit(Contract $contract)
    {
        $users = User::all();
        return view('admin.contracts.edit', compact('contract', 'users'));
    }

    // Mettre à jour un contrat spécifique
    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'contract_type' => 'required|string|max:191',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $contract->update($request->all());

        return redirect()->route('admin.contracts.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    // Supprimer un contrat spécifique
    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('admin.contracts.index')->with('success', 'Contrat supprimé avec succès.');
    }
}
