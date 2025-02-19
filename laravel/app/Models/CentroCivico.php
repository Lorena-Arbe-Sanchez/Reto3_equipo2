<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentroCivico extends Model
{
    protected $table = 'centros_civicos';

    protected $fillable = ['nombre', 'telefono', 'correo','direccion', 'codigo_postal','image'];

}
