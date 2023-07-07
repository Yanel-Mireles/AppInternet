<?php

namespace App\Http\Controllers;



use App\Models\Post;
use App\Models\User;
use App\Models\Emisor;
use App\Models\Factura;
use App\Models\Receptor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function inicio() {
        // Le pasamos toda las facturas que se tengan
        $facturas = Factura::all();
        $emisores = Emisor::all();
        $receptores = Receptor::all();
    
        // Redireccionando
        return view('auth.principal', ['facturas'=> $facturas,'emisores' => $emisores, 'receptores' => $receptores]);
    }

    // funcion para buscar una factura
    public function buscar(Request $request)
    {
        // Validación de campos
        $request->validate([
            'emisor_id' => 'required|exists:emisors,id',   // Asegurate que el valor exista en la tabla emisores
            'receptor_id' => 'required|exists:receptors,id',   // Asegurate que el valor exista en la tabla receptores
            'receptor_rfc' => 'required',
            'folio' => 'sometimes',
        ]);

        // Obtener los valores de los campos del formulario
        // $id_emisor_recibido = $request->input('emisor_rs');
        $id_emisor_recibido = $request->input('emisor_id');
        $rfc_receptor_recibido = $request->input('receptor_id');

        // Buscar la factura en la base de datos
        $facturaEncontrada = Factura::where('emisor_id', $id_emisor_recibido)
        ->where('receptor_id', $rfc_receptor_recibido)
        // ->where('id', $id_recibido_factura)
            ->first();

        if ($facturaEncontrada) {
            // Factura encontrada, mostrar mensaje de éxito
            session()->flash('success', $facturaEncontrada->id);
        } else {
            // Factura no encontrada, mostrar mensaje de error
            session()->flash('error');
        }

        return redirect()->route('dashboard')->withInput();
    }
}
