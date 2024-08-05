<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartment;

class ApartmentsTableSeeder extends Seeder
{
    public function run()
    {
        Apartment::query()->delete(); // Elimina todos los registros de la tabla apartments.

        $apartments = [
            [
                'name' => 'Apartamento con increíbles vistas al mar',
                'description' => 'Luminoso apartamento con increíbles vistas al mar, equipado con lo necesario para pasar unas fantásticas vacaciones desde donde contemplar amaneceres únicos y espectaculares. Ideal para parejas. Cerca de calas cristalinas aptas para buceo, relajarse, etc... Ubicado en Calafat, urbanización tranquila y familiar. Cerca de puntos de interés tales como el Delta del Ebro, Port Aventura, las ruinas de Tarraco, etc...',
            ],
            [
                'name' => 'Loft con vistas al mar',
                'description' => 'Luminoso loft con vistas al mar en la urbanización Calafat en L\'Ametlla de Mar. Ideal para parejas. El loft, en planta baja, cuenta con terraza con vistas al mar, sofá cama (sistema italiano) con colchón de 140 cm de ancho, placa vitrocerámica, microondas, refrigerador grande, cafetera "Dolce Gusto", plato de ducha. A un minuto andando de una cala de aguas cristalinas.',
            ],

        ];

        foreach ($apartments as $apartment) {
            Apartment::create($apartment);
        }
    }
}
