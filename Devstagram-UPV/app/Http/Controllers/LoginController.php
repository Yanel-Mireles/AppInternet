<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // La función devuelve una vista de una página de inicio de sesión en PHP.

    public function index(){
        return view("auth.login");
    }

    /**
     * Esta función valida la entrada del usuario para el correo electrónico y la contraseña, intenta
     * autenticar al usuario y lo redirige a la página de índice de la publicación si tiene éxito o
     * muestra un mensaje de error si la autenticación falla.
     */
    public function store(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            //Usar la directiva with para llenar los valores de la sesion
            return back()->with('mensaje','Credenciales incorrectas');
        } else{ //Credenciales correctas
            return redirect()->route('post.index');
        }
    }
}
