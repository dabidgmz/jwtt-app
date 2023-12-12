<?php

// app/Http/Controllers/VerificationController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Carbon;

class VerificationController extends Controller
{
    public function verify($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        if ($user->email_verified_at === null) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            $user->status = true;
            return redirect()->route('bienvenida.index', ['userId' => $user->id]);
        }
        return redirect()->route('otra_ruta');
    }
}
