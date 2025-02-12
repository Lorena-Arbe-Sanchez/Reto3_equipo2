<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use Notifiable;

    protected $table = 'administradores';

    protected $fillable = ['nombre', 'apellidos', 'dni','direccion', 'dni','direccion','codigo_postal', 'usuario','password'];

}
