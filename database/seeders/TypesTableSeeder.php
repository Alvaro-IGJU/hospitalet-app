<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::query()->delete(); // Elimina todos los registros de la tabla types.

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
