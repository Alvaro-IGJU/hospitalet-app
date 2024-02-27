<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Type::truncate(); // Vacía la tabla antes de insertar nuevos datos.

        $types = [
            'Vistas panorámicas',
            'Baño',
            'Dormitorio y lavandería',
            'Entretenimiento',
            'Para familias',
            'Calefacción y refrigeración',
            'Cocina y comedor',
            'Características de la ubicación',
            'Exterior',
            'Aparcamiento e instalaciones',
            'Servicios',
        ];

        foreach ($types as $typeName) {
            Type::create(['name' => $typeName]);
        }
    }
}
