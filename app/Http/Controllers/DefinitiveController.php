<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefinitiveController extends Controller
{
    public function getEmpresas() {
        try{
            $userId = Auth::user()->id;
            
            
            $empresas = DB::table('user_empresa')
            ->leftJoin('empresas', 'user_empresa.empresa_id', '=', 'empresas.id')
            ->where('user_id', $userId)
            ->get();;

            return response()->json([
                'userId' => $userId,
                'empresas' => $empresas
            ]);
        }
        catch(RequestException $error){
            return response()->json(['error' => $error], 401);
        }
    }
}
