<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
        'creditos',
    ];

    /**
     * Relación muchos a muchos con Estudiante
     */
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'curso_estudiante', 'curso_id', 'estudiante_id');
    }
}
