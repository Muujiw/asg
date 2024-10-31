<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientQuoteRequestController extends Controller
{
    // Afficher le formulaire de demande de devis
    public function create()
    {
        return view('client.quote_requests.create');
    }

    // Stocker une nouvelle demande de devis
    public function store(Request $request)
    {
        $request->validate([
            'contract_type' => 'required|string|max:191',
            'start_date' => 'required|date',
            'details' => 'nullable|string',
        ]);

        QuoteRequest::create([
            'user_id' => Auth::id(),
            'contract_type' => $request->contract_type,
            'start_date' => $request->start_date,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Votre demande de devis a été soumise avec succès.');
    }
}
