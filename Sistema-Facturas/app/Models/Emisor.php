<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* La clase Emisor es un modelo en Laravel que representa una entidad con atributos como razon_Social,
email y rfc, y tiene una relación de uno a muchos con la clase Factura. */
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
