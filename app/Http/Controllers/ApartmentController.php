<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{

    public function index(){
        $apartments = Apartment::all();
        $this->sendTelegramMessage("Nuevo acceso a la web principal");
        return view('welcome', ['apartments' => $apartments]); 
    }
    private function sendTelegramMessage($message)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        $url = "https://api.telegram.org/bot{$token}/sendMessage";
    
        try {
            $response = Http::post($url, [
                'chat_id' => $chatId,
                'text' => $message
            ]);
    
            if ($response->successful()) {
                // Mensaje enviado correctamente
            } else {
                // Manejar el error
                // Log::error('Error al enviar el mensaje a Telegram: ' . $response->body());
            }
        } catch (\Exception $e) {
            // Log::error('Excepción al enviar el mensaje a Telegram: ' . $e->getMessage());
        }
    }
    
    public function show($id)
    {
        $apartment = Apartment::find($id);
        $other_apartment_enabled = Apartment::find($id== 1? 2:1)->enabled;
        if (!$apartment) {
            abort(404, 'Apartamento no encontrado');
        }

        // Obtener solo los bookings donde la columna "booked" sea igual a 1
        $bookings = $apartment->bookings()->where('booked', 1)->get();
        $freeWeeks =  $apartment->bookings()->where('booked', 0)->get();
        $photos = $this->getApartmentPhotos($id);
        $view = "";
        if($id == 1){
            $view = 'apartments.up';
        }else{
            $view = 'apartments.down';
        }
        $this->sendTelegramMessage("Alguien ha entrado a ver ".$apartment->name);

        return view($view, ['apartment' => $apartment, 'bookings' => $bookings,'freeWeeks' => $freeWeeks, 'photos' => $photos, 'otherApartmentEnabled' => $other_apartment_enabled]);
    }



    public function getApartmentPhotos($id): array
    {
        $apartmentDirectory = public_path('uploads/' . $id);
        if (file_exists($apartmentDirectory)) {
            $files = scandir($apartmentDirectory);

            // Filtrar los archivos para eliminar "." y ".." (directorios de referencia)
            $files = array_diff($files, array('.', '..'));

            // Construir la ruta completa para cada archivo
            $files = array_map(function ($file) use ($id) {
                return 'uploads/' . $id . '/' . $file;
            }, $files);

            // Reemplazar la barra diagonal inversa con la barra diagonal en cada ruta de archivo
            $files = array_map(function ($file) {
                return str_replace('\\', '/', $file);
            }, $files);

            // Girar el array para que los archivos se ordenen al revés
            $files = array_reverse($files);

            // Ahora puedes hacer lo que necesites con los archivos, como pasarlos a tu vista
            return $files;
        } else {
            // El directorio del apartamento no existe, puedes manejar este caso como desees
            return [];
        }
    }

    public function updateEnabledStatus(Request $request, $id){
        $apartment = Apartment::findOrFail($id);
        if($request->input('changeState') == "true"){
            $apartment->enabled = true;
        }else{
            $apartment->enabled = false;

        }
      
        $apartment->save();

        return $apartment;
    }

    public function interestingPoints(){
        $apartments = Apartment::all();
        return view('points_of_interest', ['apartments' => $apartments]);
    }
    
}
