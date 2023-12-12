<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioEmpresa;

class UsuarioEmpresaController extends Controller
{
    public function asociarEmpresaUsuario(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:user,id',
                'empresa_id' => 'required|exists:empresas,id',
            ]);

            UsuarioEmpresa::create($request->only(['user_id', 'empresa_id']));

            return response()->json(['message' => 'Asociación creada con éxito'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la asociación', 'message' => $e->getMessage()], 500);
        }
    }

    public function obtenerEmpresasPorUsuario($userId)
    {
        try {
            $empresas = UsuarioEmpresa::where('user_id', $userId)->with('empresa')->get();

            return response()->json($empresas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener empresas', 'message' => $e->getMessage()], 500);
        }
    }
}

