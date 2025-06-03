<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::latest()->get();
        return view('home', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'picture' => 'nullable|image|max:2048', // max 2MB
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('productos', 'public');
        }

        $producto = Producto::create($validated);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'picture' => 'nullable|image|max:2048', // max 2MB
        ]);

        

        $producto = Producto::create($validated);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        // Eliminar la imagen del producto si existe
        if ($producto->picture && file_exists(public_path($producto->picture))) {
            unlink(public_path($producto->picture));
        }

        $producto->delete();

        return redirect('/');
    }
}
