<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function showRegisterForm()
    {
        return view('auth.registro');
    }

    public function login(Request $request)
{
    // Validar los datos del usuario
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Si las credenciales son correctas, redirigir a la ruta deseada
        return redirect()->route('iniciosesion');
    }

    // Si las credenciales son incorrectas, volver al formulario de login con un mensaje de error
    return redirect()->route('login')->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
}


    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
