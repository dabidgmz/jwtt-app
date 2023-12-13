<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioEmpresa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Log;

class UsuarioEmpresaController extends Controller
{
    public function asociarEmpresaUsuario(Request $request, $user_id, $empresa_id)
    {
        try {
            // No es necesario validar los parámetros de la ruta si confías en que serán proporcionados correctamente.

            UsuarioEmpresa::create([
                'user_id' => $user_id,
                'empresa_id' => $empresa_id,
            ]);

            Log::info('Asociación creada con éxito', [
                'user_id' => $user_id,
                'empresa_id' => $empresa_id,
            ]);

            // Modificar la respuesta para incluir los datos enviados
            return response()->json([
                'message' => 'Asociación creada con éxito',
                'user_id' => $user_id,
                'empresa_id' => $empresa_id,
            ], 201);
        } catch (Exception $e) {
            Log::error('Error al procesar la solicitud: ' . $e->getMessage(), [
                'user_id' => $user_id ?? null,
                'empresa_id' => $empresa_id,
            ]);

            // Modificar la respuesta para incluir el mensaje de error y los datos de la solicitud
            return response()->json([
                'error' => 'Error al procesar la solicitud',
                'exception' => $e->getMessage(),
                'user_id' => $user_id ?? null,
                'empresa_id' => $empresa_id,
            ], 500);
        }
    }

    // Resto del controlador...

}
