<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = ['titulo', 'descripcion', 'fecha_inicio','fecha_fin', 'dia1','dia2','hora_inicio', 'hora_fin','idioma','plazas_totales','plazas_minimas','edad_minima','edad_maxima','imagen','administrador_id'];

    public function centro_civico(){
        return $this->belongsTo(CentroCivico::class, 'id_centro_civico');
    }
}
