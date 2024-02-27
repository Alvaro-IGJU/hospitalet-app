<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\Icon;

class ApartmentIconSeeder extends Seeder
{
    public function run()
    {
        // Elimina todos los registros existentes en la tabla pivot.
        \DB::table('apartment_icon')->truncate();

        // Obtiene todos los apartamentos y los íconos.
        $apartments = Apartment::all();
        $icons = Icon::all();

        // Itera sobre los apartamentos y los íconos y los vincula entre sí.
        foreach ($apartments as $apartment) {
            $apartment->icons()->sync($icons->pluck('id'));
        }
    }
}
