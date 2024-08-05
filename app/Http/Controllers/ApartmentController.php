<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Type;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    public function index(){
        $apartments = Apartment::all();
        return view('welcome', ['apartments' => $apartments]); 
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

    
}
