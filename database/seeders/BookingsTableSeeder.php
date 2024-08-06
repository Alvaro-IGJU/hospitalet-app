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
        // Crear reserva para el apartamento 1
        $booking = new Booking();
        $booking->apartment_id = 1; // ID del apartamento
        $booking->check_in = $currentDate->toDateString();
        $booking->check_out = $currentDate->copy()->addDays(7)->toDateString(); // Agregar 6 días para una semana
        $booking->price = rand(100, 200); // Precio aleatorio entre 100 y 200
        $booking->booked = rand(0, 1); // Estado de reserva aleatorio: 1 para reservado, 0 para no reservado
        $booking->save();

        // Mover a la próxima semana
        $currentDate->addWeek();
    }


    $startDate = Carbon::createFromDate(null, 5, 1)->startOfWeek(Carbon::SUNDAY); // Primer sábado de mayo
    // dd($startDate);
    $endDate = Carbon::createFromDate(null, 9, 30)->endOfWeek(Carbon::SATURDAY); // Último viernes de septiembre
    // Restablecer $currentDate para el segundo bucle
    $currentDate = $startDate->copy();

    while ($currentDate <= $endDate) {
        // Crear reserva para el apartamento 2
        $booking = new Booking();
        $booking->apartment_id = 2; // ID del apartamento
        $booking->check_in = $currentDate->toDateString();
        $booking->check_out = $currentDate->copy()->addDays(7)->toDateString(); // Agregar 6 días para una semana
        $booking->price = rand(100, 200); // Precio aleatorio entre 100 y 200
        $booking->booked = rand(0, 1); // Estado de reserva aleatorio: 1 para reservado, 0 para no reservado
        $booking->save();

        // Mover a la próxima semana
        $currentDate->addWeek();
    }
}

}
