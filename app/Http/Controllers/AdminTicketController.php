<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketResponseMail;

class AdminTicketController extends Controller
{
    // Afficher tous les tickets
    public function index()
    {
        $tickets = Ticket::with('user')->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    // Afficher le formulaire de réponse à un ticket
    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit', compact('ticket'));
    }

     // Enregistrer la réponse au ticket et envoyer un email
     public function update(Request $request, Ticket $ticket)
     {
         $request->validate([
             'response' => 'required|string',
         ]);
 
         // Mettre à jour le ticket avec la réponse et l'état résolu
         $ticket->update([
             'response' => $request->response,
             'is_resolved' => $request->has('is_resolved') ? true : false,
         ]);
 
         // Envoyer un email au client avec la réponse
         Mail::to($ticket->user->email)->send(new TicketResponseMail($ticket));
 
         return redirect()->route('admin.tickets.index')->with('success', 'La réponse a été envoyée et un email a été envoyé au client.');
     }

    // Supprimer un ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.tickets.index')->with('success', 'Le ticket a été supprimé.');
    }
}
