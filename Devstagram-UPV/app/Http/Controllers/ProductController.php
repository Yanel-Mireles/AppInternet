<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request,$next){
            if(!Auth::check()){
                // Si el usuario no está autenticado, redireccionar a otra vista
                return redirect()->route('index');
            }
            return $next($request);
        });
    }

    public function index(){
        return view('registerProducts');
    }

    
    public function store(Request $request){
        // Validar los campos del formulario
        $validatedData = $request->validate([
            'descripcionCorta' => 'required',
            'descripcionLarga' => 'required',
            'precioVenta' => 'required|numeric',
            'precioCompra' => 'required|numeric',
            'stock' => 'required|integer',
            'pesoProducto' => 'required|numeric',
        ]);  
        // Crear un nuevo registro en la base de datos
        Product::create([
            'descripcionCorta' => $validatedData['descripcionCorta'],
            'descripcionLarga' => $validatedData['descripcionLarga'],
            'precioVenta' => $validatedData['precioVenta'],
            'precioCompra' => $validatedData['precioCompra'],
            'stock' => $validatedData['stock'],
            'pesoProducto' => $validatedData['pesoProducto'],
            'fechaRegistro' => Carbon::now()->toDateString(),
        ]);
        
        return redirect()->route('productos.index');

    }

    public function delete(Request $request, $id)
    {
        // Buscar el producto por su ID
        $producto = Product::findOrFail($id);

        // Eliminar el producto
        $producto->delete();

        // Redireccionar a la página deseada después de la eliminación
        return redirect()->route('ver-productos');

    }
}
