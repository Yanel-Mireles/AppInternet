<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CommentController extends Controller
{
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
    public function destroy(Comment $comment)
    {
        // verifica si el usuario actual es el autor del post al que pertenece el comentario
        if (Auth::user()->id !== $comment->post->user_id) {
            abort(403);
        }

        $comment->delete();

        return back()->with('status', 'Comentario eliminado correctamente!');
    }
}
