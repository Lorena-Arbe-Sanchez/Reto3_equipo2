<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';

    protected $fillable = ['nombre', 'apellidos', 'dni','direccion', 'dni','direccion','codigo_postal', 'usuario','password'];

}
