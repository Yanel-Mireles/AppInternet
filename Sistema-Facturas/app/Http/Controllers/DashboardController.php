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
        $id_emisor_recibido = $request->input('emisor_id');
        $rfc_receptor_recibido = $request->input('receptor_id');
        $folio_recibido = $request->input('folio');

        // Comienza la construcción de la consulta
        $query = Factura::query();
        $query->where('emisor_id', $id_emisor_recibido)
            ->where('receptor_id', $rfc_receptor_recibido);
        
        // Si el folio está presente en la solicitud, se agrega a la consulta
        if (!empty($folio_recibido)) {
            $query->where('folio', $folio_recibido);
        }

        $facturasEncontradas = $query->get();

        if ($facturasEncontradas->isNotEmpty()) {
            // Facturas encontradas, mostrar mensaje de éxito
            session()->flash('success', $facturasEncontradas->pluck('id')->toArray());
        } else {
            // Facturas no encontradas, mostrar mensaje de error
            session()->flash('error');
        }

        return redirect()->route('dashboard')->withInput();
    }

}
