<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth; 

class PostCOntroller extends Controller
{
    //Constructor para la protexion de la url "Dashboard"
    //Este es lo que se ejecuta cuando instanciamos un controlador
    public function __construct(){
        //Protegemos la url
        //al metodo index con el contructor le pasamos el parametro de autenticación 
        
        $this->middleware('auth')->except(['show','index']);

    }

    //clase que me redireccione al dashboad

    /*
     * Esta función recupera y muestra publicaciones de un usuario específico en una vista de tablero.
     * 
     */
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


    /*
     * Esta función muestra una publicación con sus comentarios y usuario asociados.
     * 
     */
    public function show(User $user, Post $post){
        $comments = $post->comments()->latest()->get();
        
        return view('post.show', [
            'post' => $post,
            'user' => $user,
            'comments' => $comments
        ]);  
    }
    /*
     * Esta función elimina una publicación si el usuario actual es el autor de la publicación.
     * 
     */
    public function destroy(Post $post)
    {
        // verifica si el usuario actual es el autor del post
        if (Auth::user()->id !== $post->user_id) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('post.index', auth()->user()->username)->with('status', 'Post eliminado correctamente!');
    }
    
    }


