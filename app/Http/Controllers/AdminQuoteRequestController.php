<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class AdminQuoteRequestController extends Controller
{
    // Afficher toutes les demandes de devis
    public function index()
    {
        $quoteRequests = QuoteRequest::with('user')->get(); // Récupérer toutes les demandes
        return view('admin.quote_requests.index', compact('quoteRequests'));
    }

    // Marquer une demande de devis comme traitée
    public function process(QuoteRequest $quoteRequest)
    {
        $quoteRequest->update(['is_processed' => true]);

        return redirect()->route('admin.quote_requests.index')->with('success', 'La demande de devis a été marquée comme traitée.');
    }

    // Supprimer une demande de devis
    public function destroy(QuoteRequest $quoteRequest)
    {
        $quoteRequest->delete();

        return redirect()->route('admin.quote_requests.index')->with('success', 'La demande de devis a été supprimée.');
    }
}
