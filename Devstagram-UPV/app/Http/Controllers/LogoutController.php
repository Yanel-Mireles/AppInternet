<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    

    // La función "almacenar" cierra la sesión del usuario autenticado y lo redirige a la página de inicio
    // de sesión.

    public function store(){
        auth()->logout();

        return redirect('login');
    }
}
