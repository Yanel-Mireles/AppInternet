<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'post_id',
        'content'
    ];

    /*
     * Esta función define una relación entre el modelo actual y el modelo de Usuario en PHP.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /*
     * Esta función define una relación entre el modelo actual y el modelo Post en una aplicación PHP
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}