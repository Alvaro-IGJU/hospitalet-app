<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use Carbon\Carbon;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::now()->startOfYear(); // Empezar desde el inicio del año actual
        $endDate = Carbon::now()->endOfYear(); // Terminar al final del año actual

        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            // Verificar si $currentDate es un sábado
            if ($currentDate->dayOfWeek == Carbon::SATURDAY) {
                // Crear reserva para el sábado actual
                $booking = new Booking();
                $booking->apartment_id = 1; // ID del apartamento
                $booking->check_in = $currentDate->toDateString();
                $booking->check_out = $currentDate->copy()->addDays(6)->toDateString(); // Agregar 6 días para una semana
                $booking->save();



            }
            // Mover a la próxima semana
            $currentDate->addDays(6);
          
        }
    }
}
