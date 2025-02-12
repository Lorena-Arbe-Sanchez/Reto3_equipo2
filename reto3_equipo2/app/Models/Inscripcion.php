<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';
    protected $fillable = ['id_actividad', 'id_ciudadano'];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'id_actividad', 'id');
    }
}
