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
    // public function index(){
    //     //Aplicar helper para revisar el usuario autenticado
    //     // dd(auth()->user());

    //     //Muestra la vista del dashboard
    //     return view('dashboard');

    // }

    // public function index(){
    //     // Obtén todos los posts de la base de datos
    //     $posts = auth()->user()->post;
    
    //     if (isset($posts)){
    //         // Pasa los posts a la vista de dashboard
    //         return view('dashboard',compact('posts'));
    //     }else{
    //         $posts = [];
    //         return view('dashboard',compact('posts'));
    //     }

    // }

    // public function index(User $user){
    //     //obtener los post de publicacion del usuario
    //     $posts=Post::where('user_id',$user->id)->get();

    //     //mostrar los post de publicacion del usuario
    //     // dd($post);

    //    return view('dashboard',[
    //         'user' => $user,
    //         //pasamos los valsores de los post de publicacion del usuario hacia la vista
    //         'posts'=> $posts
    //    ]);

    // }

    public function index(User $user){
        // Obtenemos los Post de publicación del usuario
        $posts = Post::where('user_id',$user->id)->paginate(8);
        
    
        // Retornamos a la vista con username
        return view('dashboard',[
            'user'=>$user,
            // Pasamos los valroes de los Post de Publicacion hacia la vista
            'posts' => $posts
        ]);
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

        return redirect()->route('post.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('post.show', ['post' => $post]);
    }


}

