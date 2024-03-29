<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    public function read($id = null)
    {
        $apartments = [];
        if ($id != null) {
            $apartment = Apartment::find($id);
            $apartments[] = $apartment;
            $bookings[$apartment->id] = $apartment->bookings()->get();

            return view('admin.read', compact('apartments', 'bookings'));
        } else {
            $apartments = Apartment::all();

            $bookings = [];

            foreach ($apartments as $apartment) {
                $bookings[$apartment->id] = $apartment->bookings()->get();
            }

            return view('admin.read', compact('apartments', 'bookings'));
        }
    }

    public function loginView(){
        Auth::logout();

        return view('admin.login');
    }

    public function login(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required', // Añade las reglas de validación que necesites
            'password' => 'required' // Por ejemplo, 'required|min:6' para requerir al menos 6 caracteres
        ]);
    
        $credentials = $request->only('name', 'password');
    
        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // El usuario está autenticado, redireccionarlo a donde desees
            return redirect()->intended('admin'); // Asegúrate de cambiar 'dashboard' por la URL a la que quieras redirigir después del inicio de sesión
        } else {
            // El usuario no está autenticado, mostrar un mensaje de error o redirigirlo de vuelta al formulario de inicio de sesión con un mensaje de error
            return redirect()->route('admin.login')->with('error', 'Credenciales inválidas. Por favor, inténtalo de nuevo.');
        }
    }
    
}
