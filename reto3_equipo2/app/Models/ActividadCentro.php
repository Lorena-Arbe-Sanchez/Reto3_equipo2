<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadCentro extends Model
{
    protected $table = 'actividad_centro';

    protected $fillable = ['id_actividad', 'id_centro'];

}
