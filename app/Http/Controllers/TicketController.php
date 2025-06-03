<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('usuario')->get();
        return view('tickets.index', compact('tickets'));
    }
    public function create()
    {
        $usuarios = Usuario::all();
        return view('tickets.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'usuario_id' => 'required|exists:usuarios,id',
            'file' => 'nullable|image|max:10240', // max 10MB
        ]);

        $path = null;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('tickets', 'public');
        }

        Ticket::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'usuario_id' => $validated['usuario_id'],
            'image' => $path,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket creado exitosamente.');
    }

    public function edit(Ticket $ticket)
    {
        $usuarios = Usuario::all(); // si quieres permitir cambiar el usuario
        return view('tickets.edit', compact('ticket', 'usuarios'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        // Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'usuario_id' => 'required|exists:usuarios,id',
            'file' => 'nullable|image|max:10240', // 10MB máx
        ]);

        // Actualizar campos básicos
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->usuario_id = $request->usuario_id;

        // Reemplazar imagen si se subió una nueva
        if ($request->hasFile('file')) {
            // Eliminar imagen anterior si existe
            if ($ticket->image && Storage::exists($ticket->image)) {
                Storage::delete($ticket->image);
            }

            // Guardar nueva imagen
            $ruta = $request->file('file')->store('tickets', 'public');
            $ticket->image = $ruta;
        }

        $ticket->save();

        return redirect()->route('tickets.index')
            ->with('success', 'El ticket se actualizó correctamente.');
    }


    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        if ($ticket->image) {
            Storage::disk('public')->delete($ticket->image);
        }
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket eliminado exitosamente.');
    }
}
