<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class BookingController extends Controller
{

    public function getAll($id = null)
    {
        if ($id != null) {
            $apartment = Apartment::find($id);
            $bookings[$apartment->id] = $apartment->bookings()->orderBy('check_in')->get();

            // return view('admin.read', compact('apartments', 'bookings'));

        } else {
            $apartments = Apartment::all();
            $bookings = [];

            foreach ($apartments as $apartment) {
                $bookings[$apartment->id] = $apartment->bookings()->orderBy('check_in')->get();
            }

            // return view('admin.read', compact('apartments', 'bookings'));
        }
        return $bookings;
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            // Define validation rules for booking fields here
            // For example:
            // 'check_in' => 'required|date',
            // 'check_out' => 'required|date|after:check_in',
            // 'price' => 'required|numeric',
            // 'booked' => 'required|boolean',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->check_in = $request->input('check_in');
        $booking->check_out = $request->input('check_out');
        $booking->price = $request->input('price');
        $booking->booked = $request->input('booked');
        $booking->save();

        return $booking;
        // return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
    }


    public function create(Request $request)
    {
        $booking = new Booking();
        $booking->apartment_id = $request->input('apartment_id');
        $booking->check_in = $request->input('check_in');
        $booking->check_out = $request->input('check_out');
        $booking->price = $request->input('price');
        $booking->booked = $request->input('booked');

        return $booking->save();
    }

    public function delete(Request $request)
    {
        $bookingId = $request->input('booking_id');

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        try {
            $booking->delete();
            return response()->json(['message' => 'Booking deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete booking'], 500);
        }
    }



    public function automaticWeeks(Request $request)
    {
        // Determinar la ID del apartamento
        $apartmentId = $request->input('apartment_id');

        if ($apartmentId == 1) {
            // Para el apartamento 1, el rango va del primer sábado de junio al último sábado de septiembre
            $startDate = Carbon::createFromDate(null, 6, 1)->startOfWeek(Carbon::SATURDAY);
            if ($startDate->month != 6) {
                $startDate->addWeek();
            }
            $endDate = Carbon::createFromDate(null, 9, 30)->endOfWeek(Carbon::SATURDAY);
            if ($endDate->month != 9) {
                $endDate->subWeek();
            }
        } elseif ($apartmentId == 2) {
            // Para el apartamento 2, el rango va del primer domingo de junio al último domingo de septiembre
            $startDate = Carbon::createFromDate(null, 6, 1)->startOfWeek(Carbon::SUNDAY);
            if ($startDate->month != 6) {
                $startDate->addWeek();
            }
            $endDate = Carbon::createFromDate(null, 9, 30)->endOfWeek(Carbon::SUNDAY);
            if ($endDate->month != 9) {
                $endDate->subWeek();
            }
        } else {
            return response()->json(['error' => 'Invalid apartment ID'], 400);
        }

        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            // Crear reserva para el apartamento con la ID dada
            $booking = new Booking();
            $booking->apartment_id = $apartmentId; // ID del apartamento
            $booking->check_in = $currentDate->toDateString();
            $booking->check_out = $currentDate->copy()->addWeek()->toDateString(); // Agregar 7 días para una semana completa
            $booking->price = 150; // Precio aleatorio entre 100 y 200
            $booking->booked = 0; // Estado de reserva aleatorio: 1 para reservado, 0 para no reservado
            $booking->save();

            // Mover a la próxima semana
            $currentDate->addWeek();
        }

        return response()->json(['message' => 'Bookings created successfully'], 200);
    }

    public function generateExcel($id)
    {
        // Buscar el apartamento
        $apartment = Apartment::findOrFail($id);

        // Obtener los bookings del apartamento
        $bookings = $apartment->bookings()->orderBy('check_in')->get();

        // Crear una instancia de Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados de las columnas para los bookings
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Check In');
        $sheet->setCellValue('C1', 'Check Out');
        $sheet->setCellValue('D1', 'Precio');
        $sheet->setCellValue('E1', 'Estado');

        // Aplicar estilo a todas las celdas del documento
        $allCellStyle = [
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
        ];
        $sheet->getStyle('A1:E' . $sheet->getHighestRow())->applyFromArray($allCellStyle);

        // Encabezados de las columnas
        $headerStyle = [
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], // Letras blancas
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4a73b1']], // Fondo azul
        ];
        $sheet->getStyle('A1:E1')->applyFromArray(array_merge($headerStyle, $allCellStyle));

        // Ancho de las columnas
        $sheet->getColumnDimension('A')->setWidth(15); // ID
        $sheet->getColumnDimension('B')->setWidth(20); // Check In
        $sheet->getColumnDimension('C')->setWidth(20); // Check Out
        $sheet->getColumnDimension('D')->setWidth(15); // Precio
        $sheet->getColumnDimension('E')->setWidth(15); // Estado

        // Llenar los datos de los bookings en el archivo Excel
        $row = 2;

        foreach ($bookings as $booking) {

            $sheet->setCellValue('A' . $row, $booking->id);
            $sheet->setCellValue('B' . $row, (new DateTime($booking->check_in))->format('d-m-Y'));
            $sheet->setCellValue('C' . $row,(new DateTime($booking->check_out))->format('d-m-Y'));
            $sheet->setCellValue('D' . $row, $booking->price . "€");

            // Aplicar color según el estado del booking
            $estado = $booking->booked ? 'Reservado' : 'Disponible';
            $estadoColor = $booking->booked ? 'FF0000' : '006400';
            $sheet->setCellValue('E' . $row, $estado);
            $sheet->getStyle('A' . $row)->applyFromArray([
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
            ]);
            $sheet->getStyle('B' . $row)->applyFromArray([
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
            ]);
            $sheet->getStyle('C' . $row)->applyFromArray([
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
            ]);
            $sheet->getStyle('D' . $row)->applyFromArray([
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
            ]);
            $sheet->getStyle('E' . $row)->applyFromArray([
                'font' => ['bold' => true, 'color' => ['rgb' => $estadoColor]],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
            ]);

            $row++;
        }

        // Establecer el nombre del archivo
        $name = str_replace(' ', '_', $apartment->name);
        $filename = $name . '.xlsx';

        // Guardar el archivo en el almacenamiento temporal
        $writer = new Xlsx($spreadsheet);
        $path = 'temp/' . $filename; // No incluir el slash inicial aquí
        $writer->save(storage_path('app/' . $path)); // Asegúrate de usar storage_path() aquí

        // Leer el contenido del archivo Excel
        $excelContent = file_get_contents(storage_path('app/' . $path));

        // Codificar el contenido en base64
        $base64EncodedExcel = base64_encode($excelContent);

        // Devolver la respuesta como JSON con el contenido base64
        return response()->json(['base64' => $base64EncodedExcel]);
    }
}
