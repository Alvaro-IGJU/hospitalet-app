<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function show($id)
    {
        $apartment = Apartment::find($id);
        if (!$apartment) {
            abort(404, 'Apartamento no encontrado');
        }
        $photos = $this->getApartmentPhotos($id);
        return view('apartments.show', ['apartment' => $apartment,'photos'=>$photos]);
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
    
            // Ahora puedes hacer lo que necesites con los archivos, como pasarlos a tu vista
            return $files;
        } else {
            // El directorio del apartamento no existe, puedes manejar este caso como desees
            return [];
        }
    }
    
}
