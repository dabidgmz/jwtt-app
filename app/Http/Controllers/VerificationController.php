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
        }

        return redirect('/login')->with('message', '¡Tu cuenta ha sido verificada! Puedes iniciar sesión.');
    }
}