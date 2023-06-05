<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class GetProductController extends Controller
{
    /**
     * La función recupera todos los productos y devuelve una vista con los datos de los productos.
     * 
     * @return La función `index()` devuelve una vista llamada "productos" y pasa una variable llamada
     * "productos" que contiene todos los productos de la base de datos.
     */
    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }
}
