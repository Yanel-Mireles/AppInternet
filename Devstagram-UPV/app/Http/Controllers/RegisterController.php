<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){


        /* `->validate()` es un método en Laravel que valida los datos de solicitud HTTP
        entrantes. En este caso, está validando los datos del objeto ``, que es una
        instancia de la clase `Illuminate\Http\Request`. */
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users|email|',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'',
        ]);

        /* Este código está creando un nuevo usuario en la base de datos con el nombre, el correo
        electrónico y la contraseña proporcionados (hash usando el método `Hash::make()`). Finalmente, redirige al usuario a la ruta `post.index`. Este código es parte
        de un proceso de registro para una aplicación Laravel. */
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        // Luego,
        // intenta autenticar al usuario utilizando el correo electrónico y la contraseña
        // proporcionados. 
        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        // Finalmente, redirige al usuario a la ruta `post.index`. Este código es parte
        // de un proceso de registro para una aplicación Laravel. 
        return redirect()->route('post.index');
    }
}
