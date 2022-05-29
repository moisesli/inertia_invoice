<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
       'ruc',
       'razon_social',
       'razon_comercial',
       'direccion',
       'responsable',
       'telefono',
       'celular',
       'ubigeo'
    ];
}
