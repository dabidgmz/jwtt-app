<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BienvenidaController extends Controller
{
    public function bienvenida($userId)
    {
        $user = User::find($userId);

        return view('bienvenida', ['user' => $user]);
    }
}
