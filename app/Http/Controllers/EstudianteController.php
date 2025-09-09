<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Mostrar la lista de estudiantes
     */
    public function index()
    {
        $estudiantes = Estudiante::with('cursos')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Mostrar el formulario para crear un nuevo estudiante
     */
    public function create()
    {
        $cursos = Curso::all(); // Para elegir cursos al crear
        return view('estudiantes.create', compact('cursos'));
    }

    /**
     * Guardar un nuevo estudiante en la BD
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:estudiantes,email',
            'cursos' => 'array'
        ]);

        $estudiante = Estudiante::create($request->only(['nombre', 'apellido', 'email']));
        
        // Asociar cursos seleccionados
        if ($request->has('cursos')) {
            $estudiante->cursos()->attach($request->cursos);
        }

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado correctamente');
    }

    /**
     * Mostrar detalles de un estudiante
     */
    public function show($id)
    {
        $estudiante = Estudiante::with('cursos')->findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Mostrar formulario para editar un estudiante
     */
    public function edit($id)
    {
        $estudiante = Estudiante::with('cursos')->findOrFail($id);
        $cursos = Curso::all();
        return view('estudiantes.edit', compact('estudiante', 'cursos'));
    }

    /**
     * Actualizar estudiante en la BD
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:estudiantes,email,' . $id,
            'cursos' => 'array'
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->only(['nombre', 'apellido', 'email']));

        // Sincronizar cursos
        $estudiante->cursos()->sync($request->cursos ?? []);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente');
    }

    /**
     * Eliminar estudiante
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente');
    }
}
