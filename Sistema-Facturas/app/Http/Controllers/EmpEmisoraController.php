<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpEmisora;

class EmpEmisoraController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos proporcionados desde la vista
        $validatedData = $request->validate([
            'razon_social' => 'required',
            'correo_contacto' => 'required|email',
            'rfc_emisor' => 'required',
        ]);

        // Crear una nueva instancia del modelo EmpEmisora y asignar los valores
        $empEmisora = new EmpEmisora;
        $empEmisora->razon_social = $validatedData['razon_social'];
        $empEmisora->correo_contacto = $validatedData['correo_contacto'];
        $empEmisora->rfc_emisor = $validatedData['rfc_emisor'];

        // Guardar los datos en la tabla empEmisora
        $empEmisora->save();

        // Redireccionar a la página deseada después de guardar los datos
        return redirect()->route('Emisora'); //cambiar por una tabla donde esten todos los registros
    }
}
