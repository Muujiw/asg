<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientTicketController extends Controller
{
    // Afficher le formulaire de création de ticket
    public function create()
    {
        return view('client.tickets.create');
    }

    // Stocker un nouveau ticket
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:191',
            'message' => 'required|string',
        ]);

        Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Votre message a été envoyé à l\'administration.');
    }
}
