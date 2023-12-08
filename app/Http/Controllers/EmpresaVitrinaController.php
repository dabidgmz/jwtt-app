<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpresaVitrina;

class EmpresaVitrinaController extends Controller
{
    public function asociarEmpresaVitrina(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'vitrina_id' => 'required|exists:vitrinas,id',
        ]);

        EmpresaVitrina::create([
            'empresa_id' => $request->empresa_id,
            'vitrina_id' => $request->vitrina_id,
        ]);

        return response()->json(['message' => 'Asociación creada con éxito'], 201);
    }

    public function obtenerVitrinasPorEmpresa($empresaId)
    {
        $vitrinas = EmpresaVitrina::where('empresa_id', $empresaId)->with('vitrina')->get();

        return response()->json($vitrinas);
    }
}
