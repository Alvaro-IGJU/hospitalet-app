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
        $startDate = Carbon::createFromDate(null, 5, 1)->startOfWeek(Carbon::SATURDAY); // Primer sábado de mayo
        // dd($startDate);
        $endDate = Carbon::createFromDate(null, 9, 30)->endOfWeek(Carbon::FRIDAY); // Último viernes de septiembre

        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            // Crear reserva para la semana actual
            $booking = new Booking();
            $booking->apartment_id = 1; // ID del apartamento
            $booking->check_in = $currentDate->toDateString();
            $booking->check_out = $currentDate->copy()->addDays(7)->toDateString(); // Agregar 6 días para una semana
            $booking->price = 114.00; // Precio de la reserva
            $booking->booked = true; // Marcar como reservado
            $booking->save();

            // Mover a la próxima semana
            $currentDate->addWeek();
        }
    }
}
