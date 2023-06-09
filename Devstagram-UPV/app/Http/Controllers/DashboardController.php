<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct(){
        // Protegemos la URL
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                // Si el usuario no está autenticado, redireccionar a otra vista
                return redirect()->route('index');
            }
            return $next($request);
        });
    }

    // public function index(User $user){
    //     return view("welcome",[
    //         'user'=>$user
    //     ]);
    // }
    public function index()
    {
        // Obtener las publicaciones del usuario actual
        $posts = auth()->user()->posts;

        // Retornar la vista con las publicaciones
        return view('inicio')->with('posts', $posts);
    }

}
