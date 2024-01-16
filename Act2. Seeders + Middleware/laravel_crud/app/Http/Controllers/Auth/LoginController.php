<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Maneja el proceso de inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar iniciar sesión con las credenciales proporcionadas
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirigir al usuario a la página de inicio después del inicio de sesión exitoso
            return redirect()->intended('dashboard');
        }

        // Si el inicio de sesión falla, enviar de vuelta con un mensaje de error
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    // Maneja el proceso de cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir al usuario a la página de inicio de sesión
        return redirect('/login');
    }
}