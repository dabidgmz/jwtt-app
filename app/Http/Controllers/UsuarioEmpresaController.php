<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioEmpresa;

class UsuarioEmpresaController extends Controller
{
    public function asociarEmpresaUsuario(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user,id',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        UsuarioEmpresa::create([
            'user_id' => $request->user_id,
            'empresa_id' => $request->empresa_id,
        ]);

        return response()->json(['message' => 'Asociación creada con éxito'], 201);
    }

    public function obtenerEmpresasPorUsuario($userId)
    {
        $empresas = UsuarioEmpresa::where('user_id', $userId)->with('empresa')->get();

        return response()->json($empresas);
    }
}
