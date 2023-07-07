<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptor extends Model
{
    use HasFactory;

    // "Forzar" el nombre de la tabla
    protected $table = 'receptors';
    
    protected $fillable = [
        'nombre',
        'direccion',
        'rfc',
        'contacto',
        'razon_Social',
        'email',
    ];

    public function factura(){
        // Relación donde un post puede tener múltiples comentarios 
        return $this->hasMany(Factura::class);
    }

}
