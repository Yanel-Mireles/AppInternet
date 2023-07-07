<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emisor extends Model
{
    use HasFactory;
    protected $table = 'emisors';


    protected $fillable = [
        'razon_Social',
        'email',
        'rfc',
    ];

    public function factura(){
        // Relación donde un post puede tener múltiples comentarios 
        return $this->hasMany(Factura::class);
    }
}
