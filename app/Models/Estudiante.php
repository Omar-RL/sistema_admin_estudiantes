<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada (opcional si sigue convención).
     *
     * @var string
     */
    protected $table = 'estudiantes';

    /**
     * Clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Campos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'direccion',
    ];

    /**
     * Campos que deben ser convertidos automáticamente a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    /**
     * Relación: un estudiante puede estar inscrito en muchos cursos.
     */
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_estudiante', 'estudiante_id', 'curso_id');
    }

    /**
     * Relación: un estudiante puede estar vinculado a un usuario (login).
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
