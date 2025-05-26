<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';

    protected $fillable = ['nombre', 'correo', 'especialidad'];

    // Relación: Un profesor puede tener muchos cursos
    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
