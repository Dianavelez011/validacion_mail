<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActivacionController extends Controller
{
    // Método para mostrar el formulario
    public function mostrarFormulario()
    {
        return view('activacion');
    }

    // Método para procesar el formulario
    public function procesarFormulario(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'regional' => 'required|string',
            'primer_nombre' => 'required|string',
            'segundo_nombre' => 'nullable|string',
            'primer_apellido' => 'required|string',
            'segundo_apellido' => 'nullable|string',
            'correo_personal' => 'required|email',
            'correo_institucional' => 'required|email|ends_with:@sena.edu.co',
            'numero_contrato' => 'required|string',
            'fecha_inicio_contrato' => 'required|date',
            'fecha_terminacion_contrato' => 'required|date|after:fecha_inicio_contrato',
            'usuario' => 'required|string',
            'nemotecnia' => 'required|string',
        ]);

        // Consultar la API de SECOP para validar el contrato
        $response = Http::get('https://www.datos.gov.co/resource/jbjy-vk9h.json', [
            'id_contrato' => $request->numero_contrato,
            'documento_proveedor' => $request->cedula,
        ]);

        if ($response->successful()) {
            $contrato = $response->json();

            // Validar que el contrato esté activo
            if (empty($contrato)) {
                return back()->with('error', 'No se encontró un contrato activo con los datos proporcionados.');
            }

            // Validar la nemotecnia
            if ($contrato[0]['nemotecnia'] !== $request->nemotecnia) {
                return back()->with('error', 'La nemotecnia no coincide con el contrato.');
            }

            // Procesar la activación del usuario (guardar en la base de datos, etc.)
            // ...

            return redirect()->route('activacion')->with('success', 'Usuario activado correctamente.');
        } else {
            return back()->with('error', 'No se pudo validar la información del contrato.');
        }
    }
}