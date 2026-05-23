<?php

namespace App\Http\Controllers;

use App\Models\Threat;
use Illuminate\Http\Request;

class ThreatController extends Controller
{
    // Mostrar la lista de amenazas (pantalla principal)
    public function index()
    {
        $threats = Threat::latest()->get();
        return view('cybercore.index', compact('threats'));
    }

    // Almacenar una nueva amenaza en la base de datos con validación
    public function store(Request $request)
    {
        $validated = $request->validate([
            'alias' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'risk_level' => 'required|string',
            'description' => 'required|string',
            'cloud_link' => 'required|url' // Forzamos que sea un enlace web válido de la nube
        ]);

        Threat::create($validated);

        return redirect()->route('cybercore.index')->with('success', 'Amenaza registrada en la base de datos.');
    }

    // Eliminar un registro
    public function destroy(Threat $threat)
    {
        $threat->delete();
        return redirect()->route('cybercore.index')->with('success', 'Registro purgado del sistema.');
    }
}