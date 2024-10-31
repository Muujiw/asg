<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientContractController extends Controller
{
    // Afficher tous les contrats de l'utilisateur authentifié
    public function index()
    {
        $contracts = Contract::where('user_id', Auth::id())->get();
        return view('client.contracts.index', compact('contracts'));
    }

    public function show(Contract $contract)
{
    // Vérifiez que l'utilisateur authentifié est bien le propriétaire du contrat
    if ($contract->user_id !== Auth::id()) {
        abort(403, 'Non autorisé.');
    }

    return view('client.contracts.show', compact('contract'));
}

public function create()
{
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Non autorisé.');
    }

    $users = \App\Models\User::all(); // Récupérer tous les utilisateurs
    return view('admin.contracts.create', compact('users'));
}


    // Enregistrer un nouveau contrat (admin seulement)
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Non autorisé.');
        }
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'contract_type' => 'required|string|max:191',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Contract::create([
            'user_id' => $request->user_id,
            'contract_type' => $request->contract_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('client.contracts.index')->with('success', 'Contrat créé avec succès.');
    }

    public function edit(Contract $contract)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Non autorisé.');
        }
    
        $users = \App\Models\User::all(); // Récupérer tous les utilisateurs
        return view('admin.contracts.edit', compact('contract', 'users'));
    }
    

    // Mettre à jour un contrat spécifique
    public function update(Request $request, Contract $contract)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Non autorisé.');
        }

        $request->validate([
            'contract_type' => 'required|string|max:191',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $contract->update($request->all());

        return redirect()->route('client.contracts.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    // Supprimer un contrat spécifique
    public function destroy(Contract $contract)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Non autorisé.');
        }

        $contract->delete();

        return redirect()->route('client.contracts.index')->with('success', 'Contrat supprimé avec succès.');
    }

    public function request()
    {
        return view('client.contracts.request');
    }
}
