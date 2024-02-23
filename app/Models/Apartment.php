<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'views',
        'bathroom',
        'bedroom_laundry',
        'entertainment',
        'for_families',
        'refrigeration',
        'kitchen',
        'ubi_characteristics',
        'outside',
        'parking',
        'services',
        'image'
    ];
}


/*
INSERT INTO apartments (name, description, views, bathroom, bedroom_laundry, entertainment, for_families, refrigeration, kitchen, ubi_characteristics, outside, parking, services) 
VALUES 
('Apartamento con increíbles vistas al mar', 'Luminoso apartamento con increíbles vistas al mar, equipado con lo necesario para pasar unas fantásticas vacaciones desde donde contemplar amaneceres únicos y espectaculares. Ideal para parejas. Cerca de calas cristalinas aptas para buceo, relajarse, etc... Ubicado en Calafat, urbanización tranquila y familiar. Cerca de puntos de interés tales como el Delta del Ebro, Port Aventura, las ruinas de Tarraco, etc...',
'["Vistas al mar"]', 
'["Secador de pelo", "Productos de limpieza", "Gel de ducha", "Agua caliente"]', 
'["Lavadora", "Toallas, sábanas, jabón y papel higiénico", "Perchas", "Ropa de cama", "Almohadas y mantas adicionales", "Plancha", "Tendedero para ropa", "Espacio para guardar la ropa: armario"]', 
'["TV", "Libros y material de lectura"]', 
'["Juegos de mesa"]', 
'["Ventilador de techo"]', 
'["Cocina disponible para el uso de los huéspedes", "Frigorífico", "Microondas", "Utensilios básicos de cocina", "Platos y cubiertos", "Congelador", "Lavavajillas", "Cocina de inducción", "Cafetera", "Tostadora", "Mesa de comedor"]', 
'["Costa", "Acceso a la playa (Público o compartido)", "Entrada independiente"]', 
'["Patio o balcón (privada)", "Mobiliario exterior", "Elementos básicos para la playa"]', 
'["Aparcamiento gratuito en la calle"]', 
'["Disponible para estancias largas"]'
);
*/