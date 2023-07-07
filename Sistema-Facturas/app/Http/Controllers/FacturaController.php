<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emisor;
use App\Models\Receptor;
use App\Models\Factura;

class FacturaController extends Controller
{

    public function index(){
        
        // Obtiene todas las facturas
        $facturas = Factura::all();
        return view('auth.tablaFacturas', ['facturas' => $facturas]);
    }
    public function create()
    {
        $emisores = Emisor::all();
        $receptores = Receptor::all();
        return view('auth.factura', [
            'emisores' => $emisores,
            'receptores' => $receptores,
        ]);
    }

    public function store(Request $request)
        {
            // dd($request->all());
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
