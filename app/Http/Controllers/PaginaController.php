<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;   // ← AGREGAR esta línea

/**
 * PaginaController
 *
 * Gestiona las 5 páginas del proyecto final SIS-500.
 * Conectado a routes/web.php mediante las 5 rutas definidas en el Ejercicio 3.
 *
 * Estado: STUB — métodos con respuesta provisional.
 * Los métodos se completan el Día 13.
 */
class PaginaController extends Controller
{
    /**
     * RUTA: GET /
     * La ruta GET / ya devuelve la vista welcome desde routes/web.php.
       * DÍA 12: cambiar 'welcome' por 'inicio' cuando se cree resources/views/inicio.blade.php
     */
    public function inicio()
    {
        return view('inicio', [
            'nombre'   => 'Ysrael Mauricio Lopez Rossel',
            'carrera'  => 'Ingeniería de Sistemas',
            'semestre' => 'Sexto semestre',
            'año'      => date('Y'),
        ]);
    }

    /**
     * RUTA: GET /sobre-mi
     * Día 13: return view('sobre-mi', ['habilidades' => [...], 'motivacion' => '...']);
     */
    public function sobreMi()
    {
        $habilidades = [
            'PHP'        => 75,
            'HTML/CSS'   => 90,
            'JavaScript' => 60,
            'Laravel'    => 55,
            'GIT'        => 70,
        ];

        return view('sobre-mi', [
            'nombre'      => 'Ysrael Mauricio Lopez Rossel',
            'carrera'     => 'Ingeniería de Sistemas',
            'semestre'    => 'Sexto semestre',
            'habilidades' => $habilidades,
        ]);
    }

    /**
     * RUTA: GET /materias
     * Día 13: instanciar objetos Materia y pasarlos a la vista.
     */
    public function materias()
    {
        // ANTES (Parte 2): instanciaba objetos manualmente con new Materia(...)
        // AHORA (Parte 3): Eloquent recupera todos los registros de la tabla 'materias'
        // La interfaz pública de Materia es IDÉNTICA — la vista no necesita cambios.
        $materias  = Materia::all();

        // avg() devuelve null si la colección está vacía → ?? 0 evita el error.
        $promedio  = round($materias->avg(fn(Materia $m) => $m->getNota()) ?? 0, 2);
        $aprobadas = $materias->filter(fn(Materia $m) => $m->estaAprobada())->count();

        return view('materias', compact('materias', 'promedio', 'aprobadas'));
    }
    /**
     * RUTA: GET /contacto
     * Día 13: return view('contacto');
     */
    public function contacto()
    {
        return view('contacto');
    }

    /**
     * RUTA: POST /contacto
     * $request contiene todos los datos del formulario enviado.
     * Día 13: validar con $request->validate([...]) y redirigir con flash message.
     */
    public function procesarContacto(Request $request)
        {
            $validated = $request->validate([
                'nombre'  => 'required|min:3|max:100',
                'email'   => 'required|email',
                'mensaje' => 'required|min:10',
            ]);

            return redirect()->route('contacto')
                ->with('exito', 'Tu mensaje fue enviado correctamente.');
        }
}

