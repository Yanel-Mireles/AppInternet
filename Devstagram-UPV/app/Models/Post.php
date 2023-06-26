<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //forzar el nombre de la tabla Post en singular
    protected $table = 'post';
    //public $timestamps=false;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id', 
    ];
    
    /*
     * Esta función de PHP devuelve una colección de comentarios asociados con un modelo.
     * 
     */
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

}

