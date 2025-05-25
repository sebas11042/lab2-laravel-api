<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Curso::create([
        'nombre' => 'Laravel Avanzado',
        'codigo' => 'LAR123',
        'creditos' => 4
    ]);

    Curso::create([
        'nombre' => 'PHP Intermedio',
        'codigo' => 'PHP456',
        'creditos' => 3
    ]);
    }
}
