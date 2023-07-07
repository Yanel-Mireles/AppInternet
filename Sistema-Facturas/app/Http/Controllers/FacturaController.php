<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emisor;
use App\Models\Receptor;
use App\Models\Factura;

class FacturaController extends Controller
{

    /**
     * La función de índice recupera todas las facturas y devuelve una vista con una tabla de las
     * facturas.
     */
    public function index(){
        
        // Obtiene todas las facturas
        $facturas = Factura::all();
        return view('auth.tablaFacturas', ['facturas' => $facturas]);
    }
/**
 * La función de creación recupera todos los emisores y receptores de la base de datos y los pasa a la
 * vista de factura.
 * 
 */
    public function create()
    {
        /* ` = Emisor::all();` está recuperando todos los registros del modelo/tabla `Emisor`
        y asignándolos a la variable ``. Esto le permite acceder y utilizar los registros
        `Emisor` en el método o vista `crear`. */
        $emisores = Emisor::all();
        /* ` = Receptor::all();` está recuperando todos los registros del modelo/tabla
        `Receptor` y asignándolos a la variable ``. Esto le permite acceder y utilizar
        los registros `Receptor` en el método o vista `crear`. */
        $receptores = Receptor::all();
        return view('auth.factura', [
            'emisores' => $emisores,
            'receptores' => $receptores,
        ]);
    }

    /**
     * La función de almacenamiento en PHP valida y almacena una nueva factura en función de los datos
     * recibidos en la solicitud.
     * 
     */
    public function store(Request $request)
        {
            // dd($request->all());
            /* La función `->validate se utiliza para validar los datos enviados
            en la solicitud. Toma dos parámetros: el objeto de solicitud y una matriz de reglas de
            validación. */
            $this->validate($request,[
                'emisor_id' => 'required|exists:emisors,id',
                'receptor_id' => 'required|exists:receptors,id',
                'folio' => 'required',
                'archivopdf' => 'required',
                'archivoxml' => 'required',
            ]);

            // Creamos la factura
            Factura::create([
            'emisor_id' => $request->emisor_id,
            'receptor_id' => $request->receptor_id,
            'folio' => $request->folio,
            'archivopdf' => $request->archivopdf,
            'archivoxml' => $request->archivoxml,
        ]);

            return redirect()->route('factura.tabla');
        }

    // FacturaController.php

    


}
