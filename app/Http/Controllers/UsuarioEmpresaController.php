<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioEmpresa;
use App\Models\User;
use App\Models\Empresa;

class UsuarioEmpresaController extends Controller
{
    /**
     * Relaciona un usuario con una empresa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function relacionarUsuarioEmpresa(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:user,id',
                'empresa_id' => 'required|exists:empresas,id',
            ]);

            // Verificar si ya existe la relación
            $relacionExistente = UsuarioEmpresa::where([
                'user_id' => $request->user_id,
                'empresa_id' => $request->empresa_id,
            ])->first();

            if ($relacionExistente) {
                return response()->json(['message' => 'La relación ya existe.'], 400);
            }

            // Crear la nueva relación
            UsuarioEmpresa::create([
                'user_id' => $request->user_id,
                'empresa_id' => $request->empresa_id,
            ]);

            return response()->json(['message' => 'Relación creada con éxito'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
