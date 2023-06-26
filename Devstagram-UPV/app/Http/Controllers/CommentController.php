<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CommentController extends Controller
{
    /*
     * Esta función de PHP almacena un comentario para una publicación y devuelve un mensaje que
     * confirma la publicación exitosa del comentario.
     */
    //
    public function store(Request $request, User $user, Post $post){
        // Validar
        $this->validate($request, [
            'content' => 'required|max:255'
        ]);

        // Almacenar
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'content' => $request->content,
        ]);


        // Imprimir un mensaje
        return back()->with('mensaje', 'Comentario publicado correctamente');
    }
    /*
     * Esta función elimina un comentario si el usuario actual es el autor de la publicación a la que
     * pertenece el comentario.
     */
    public function destroy(Comment $comment)
    {
        // verifica si el usuario actual es el autor del post al que pertenece el comentario
        if (Auth::user()->id !== $comment->post->user_id) {
            abort(403);
        }
        //elimina
        $comment->delete();

        return back()->with('status', 'Comentario eliminado correctamente!');
    }
}
