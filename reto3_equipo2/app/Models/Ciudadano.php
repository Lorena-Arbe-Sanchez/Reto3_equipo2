<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudadano extends Model
{
    protected $table = 'ciudadanos';

    protected $fillable = ['nombre', 'apellidos', 'dni','direccion', 'codigo_postal'];

}
