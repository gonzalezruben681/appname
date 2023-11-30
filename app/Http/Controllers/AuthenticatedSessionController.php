<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    //logim
    public function store(Request $request){

        $credencials =  $request->validate([
            'email' =>['required','string','email'],
            'password' => ['required','string']
        ]);
        // si el usuario y contraseña coinciden
        if(! Auth::attempt($credencials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        // Regenerar el ID de la sesión
        $request->session()->regenerate();

        // retornar a la URL prevista
        return redirect()->intended()->with('status','You are logged in');
    }

    // logout
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status','You are logged out!');

    }
}
