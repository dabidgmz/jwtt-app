<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Auth\Events\Registered;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Crea una nueva instancia de AuthController.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Obtiene un JWT via las credenciales proporcionadas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Registra un nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',
            'lastname.required' => 'El apellido es obligatorio.',
            'lastname.string' => 'El apellido debe ser una cadena de texto.',
            'lastname.max' => 'El apellido no puede tener más de :max caracteres.',
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.string' => 'El número de teléfono debe ser una cadena de texto.',
            'phone.regex' => 'El número de teléfono debe contener exactamente 10 dígitos y solo dígitos.',
            'matricula.required' => 'La matrícula es obligatoria.',
            'matricula.string' => 'La matrícula debe ser una cadena de numeros.',
            'matricula.min' => 'La matrícula debe tener al menos :min caracteres.',
            'matricula.max' => 'La matrícula no puede tener más de :max caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El correo electrónico no puede tener más de :max caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'departament.required' => 'El departamento es obligatorio.',
            'departament.string' => 'El departamento debe ser una cadena de texto.',
            'departament.max' => 'El departamento no puede tener más de :max caracteres.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'departament' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'matricula' => 'required|string|min:3|max:8',
            'password' => 'required|string|min:6|confirmed',
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $user = User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'departament' => $request->input('departament'),
            'phone' => $request->input('phone'),
            'matricula' => $request->input('matricula'),
            'status' => true,
            'password' => bcrypt($request->input('password')),
        ]);
        Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user));
        return response()->json(['msg' => "Registro correcto", 'data' => $user]);
    }

    /**
     * Obtiene el usuario autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Cierra la sesión del usuario (invalida el token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Sesión cerrada exitosamente']);
    }

    /**
     * Actualiza un token existente.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // Obtener el token actual del usuario
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json(['error' => 'Token no proporcionado'], 401);
        }
        try {
            $newToken = JWTAuth::refresh($token);
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo actualizar el token'], 401);
        }

        // Responder con el nuevo token
        return $this->respondWithToken($newToken);
    }

    /**
     * Retorna la estructura del array del token.
     *
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    /**
     * Inicia la sesión del usuario después del registro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loginAfterRegister(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Intentar realizar el inicio de sesión del nuevo usuario
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        // Responder con el token
        return $this->respondWithToken($token);
    }
}
