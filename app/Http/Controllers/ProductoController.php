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

        $rutaImagen = null;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Mover el archivo a public/productos
            $file->move(public_path('productos'), $fileName);

            $rutaImagen = 'productos/' . $fileName;
        }

        $producto = Producto::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'picture' => $rutaImagen,
        ]);

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
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'picture' => 'nullable|image|max:2048',
        ]);
    
        // Si hay una nueva imagen, la guardamos y actualizamos la ruta
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('productos'), $fileName);
            $producto->picture = 'productos/' . $fileName;
        }
    
        // Actualizamos los demás campos
        $producto->name = $validated['name'];
        $producto->price = $validated['price'];
        $producto->save();
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
