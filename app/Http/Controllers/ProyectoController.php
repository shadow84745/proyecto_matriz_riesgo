<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Obtener los proyectos del usuario
        $proyectos = $user->proyectos;

        foreach ($proyectos as $proyecto) {
            $proyecto->imagen_proyecto = base64_encode($proyecto->imagen_proyecto);
        }

        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto;
        $proyecto->nombre_proyecto = $request->input('nombre_proyecto');
        $proyecto->descripcion_proyecto = $request->input('descripcion_proyecto');
    
        if ($request->hasFile('imagen_proyecto')) {
            $imagen = $request->file('imagen_proyecto');
            $imagen->store('temp'); // Almacena la imagen en una ubicación temporal
    
            $path = storage_path('app/temp/' . $imagen->hashName());
            $proyecto->imagen_proyecto = file_get_contents($path);
        }
    
        $proyecto->id = Auth::id();
        $proyecto->save();
    
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_proyecto)
    {
        $proyecto= Proyecto::find($id_proyecto);
        $proyecto->nombre_proyecto = $request->input('nombre_proyecto');
        $proyecto->descripcion_proyecto = $request->input('descripcion_proyecto');
    
        if ($request->hasFile('imagen_proyecto')) {
            $imagen = $request->file('imagen_proyecto');
            $imagen->store('temp'); // Almacena la imagen en una ubicación temporal
    
            $path = storage_path('app/temp/' . $imagen->hashName());
            $proyecto->imagen_proyecto = file_get_contents($path);
        }
    
        $proyecto->id = Auth::id();
        $proyecto->update();
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_proyecto)
    {
        $proyecto= Proyecto::find($id_proyecto);
        $proyecto->delete();
        return redirect()->back();
    }
}
