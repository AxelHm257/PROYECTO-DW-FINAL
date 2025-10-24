<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Auth::user()->tickets()->orderBy('created_at', 'desc')->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:baja,media,alta,urgente'
        ]);

        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket creado exitosamente.');
    }

    public function show(Ticket $ticket)
    {
        // Verificar que el ticket pertenece al usuario autenticado
        if ($ticket->user_id !== Auth::id()) {
            abort(403, 'No tienes permisos para ver este ticket.');
        }

        return view('tickets.show', compact('ticket'));
    }

    public function cancel(Ticket $ticket)
    {
        // Verificar que el ticket pertenece al usuario autenticado
        if ($ticket->user_id !== Auth::id()) {
            abort(403, 'No tienes permisos para cancelar este ticket.');
        }

        // Verificar que el ticket puede ser cancelado
        if (!$ticket->canBeCancelled()) {
            return back()->with('error', 'Solo se pueden cancelar tickets con estado "pendiente".');
        }

        $ticket->update(['status' => 'cancelado']);

        return redirect()->route('tickets.index')->with('success', 'Ticket cancelado exitosamente.');
    }
}
