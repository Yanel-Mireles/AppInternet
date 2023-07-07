<?php

namespace App\Http\Controllers;

use App\Models\Receptor;
use Illuminate\Http\Request;

class ReceptoraController extends Controller
{
    //
   /**
    * La función index recupera todos los objetos Receptor y los pasa a la vista
    * 'auth.tablaEmpresasReceptoras'.
    */
    public function index()
    {
        $receptoras = Receptor::all();
        return view('auth.tablaEmpresasReceptoras', ['receptoras' => $receptoras]);
    }

/**
 * La función de creación devuelve una vista de la plantilla "auth.receptora" en PHP.
 * 
 * @return Se está devolviendo la vista 'auth.receptora'.
 */
    public function create()
    {
        return view('auth.receptora');
    }
    

    public function store(Request $request){
        // Validaciones del formulario de registro para esto se utilizan los "name" de los campos del formulario
        $this->validate($request, [
            'nombre' => 'required|string|max:255|alpha',
            'direccion' => 'required|string|max:255',
            'rfc' => 'required|min:12|max:13', // RFC con un mínimo de 12 y máximo de 13
            'contacto' => 'required|string|max:255',
            'razon_Social' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        // Guardar registro con relaciones (Entidad-Relacion)
        // "Post" es el nombre de la relacion, el nombre esta ubicado en el modelo user
        Receptor::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'rfc' => $request->rfc,
            'contacto' => $request->contacto,
            'razon_Social' => $request->razon_Social,
            'email' => $request->email,
        ]);

        // Redireccionando 
        return redirect()->route('empresa.receptora');
    }
}
