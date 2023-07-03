<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpEmisora extends Model
{
    use HasFactory;

    protected $fillable = [
        'razon_social',
        'correo_contacto',
        'rfc_emisor',
    ];
}
