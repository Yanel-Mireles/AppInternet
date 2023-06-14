<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class PostCOntroller extends Controller
{
    //Constructor para la protexion de la url "Dashboard"
    //Este es lo que se ejecuta cuando instanciamos un controlador
    public function __construct(){
        //Protegemos la url
        //al metodo index con el contructor le pasamos el parametro de autenticación 
        
        $this->middleware('auth');

    }

    //clase que me redireccione al dashboad
    public function index(){
        //Aplicar helper para revisar el usuario autenticado
        // dd(auth()->user());

        //Muestra la vista del dashboard
        return view('dashboard');

    }

    //creando metodo "crate" para formulario de publicaciones
    public function create(){
        //dd("creando publicacion");
        return view('post.create');
    }

    public function store(Request $request){
        //validaciones del formulario de registro usando name
        $validateData = $request->validate([
            'titulo'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
        ]);
        // Post::create([
        //     // 'titulo'=>$validateData['titulo'],
        //     // 'descripcion'=>$validateData['descripcion'],
        //     // 'imagen'=>$validateData['imagen'],
        //     'titulo'=>$request->titulo,
        //     'descripcion'=>$request->descripcion,
        //     'imagen'=>$request->imagen,
        //     //identificamos el usuario autenticado
        //     'user_id'=>auth()->user()->id,
        //     //redireccionamos al muro pricipal
            
        // ]);

        //guardar registro con relaciones (E-R)
        //"Post" es el nombre de la relacion

        $request->user()->post()->create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            //identificamos el usuario autenticado
            'user_id'=>auth()->user()->id,
        ]);

        return redirect()->route('post.index');
    }


}

