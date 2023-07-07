<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* La clase Factura es un modelo en PHP que representa una factura y tiene relaciones con las clases
Receptor y Emisor. */
class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
        'emisor_id', 
        'receptor_id',
        'folio',
        'archivopdf',
        'archivoxml',
    ];


    public function receptor(){
        // Relación donde un post puede tneer múltiples usuarios
        return $this->belongsTo(Receptor::class);
    }
    public function emisor(){
        // Relación donde un post puede tneer múltiples usuarios
        return $this->belongsTo(Emisor::class);
    }
}
