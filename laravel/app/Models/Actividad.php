<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = ['titulo', 'descripcion', 'fecha_inicio','fecha_fin', 'dia_1','dia_2','hora_inicio', 'hora_fin','idioma','plazas_totales','plazas_disponibles','plazas_minimas','edad_minima','edad_maxima','imagen','administrador_id', 'centro_civico_id'];

    public function centroCivico(){
        return $this->belongsTo(CentroCivico::class, 'centro_civico_id', 'id');
    }
}
