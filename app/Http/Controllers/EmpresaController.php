<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use App\Models\UsuarioEmpresa;

class EmpresaController extends Controller
{
    // CRUD Empresa
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json(['empresas' => $empresas], 200);
    }

    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        return response()->json(['empresa' => $empresa], 200);
    }

    public function create(Request $request)
    {
        $userId = Auth()->user()->id;
        if ($userId){

            $request->validate([
                'nombre' => 'required|string|max:100',
            ]);
            
        $empresa = Empresa::create([
            'nombre' => $request->input('nombre'),
        ]);

        $userEmpresa =UsuarioEmpresa::create([
            'user_id'=>$userId,
            'empresa_id'=>$empresa->id
        ]);
        return response()->json(['message' => 'Empresa creada exitosamente', 'data'=>$empresa], 201);

        }
        else{
            return response()->json(['message' => 'Usuario no encontrado']);
        }


    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $empresa = Empresa::findOrFail($id);
        $empresa->update([
            'nombre' => $request->input('nombre'),
        ]);

        return response()->json(['message' => 'Empresa actualizada exitosamente']);
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return response()->json(['message' => 'Empresa eliminada exitosamente']);
    }
}
