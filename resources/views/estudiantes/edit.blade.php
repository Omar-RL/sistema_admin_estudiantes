@extends('adminlte::page')

@section('title', 'Editar Estudiante')

@section('content_header')
    <h1>Editar Estudiante</h1>
@stop

@section('content')
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo para el ID del estudiante (oculto) -->
        <input type="hidden" id="id" name="id" value="{{ old('id', $estudiante->id) }}" readonly>

        <!-- Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" 
                   value="{{ old('nombre', $estudiante->nombre) }}" required>
        </div>

        <!-- Apellido -->
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" 
                   value="{{ old('apellido', $estudiante->apellido) }}" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="{{ old('email', $estudiante->email) }}" required>
        </div>

        <!-- Cursos -->
        <div class="form-group">
            <label for="cursos">Cursos</label>
            <select name="cursos[]" id="cursos" class="form-control" multiple>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}"
                        {{ in_array($curso->id, old('cursos', $estudiante->cursos->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $curso->nombre }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Mantén presionada la tecla Ctrl (o Cmd) para seleccionar múltiples cursos.</small>
        </div>

        <!-- Botón de actualización -->
        <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
    </form>
@stop

@section('css')
    {{-- Puedes añadir estilos adicionales si deseas --}}
@stop

@section('js')
    <script>
        console.log("Editar Estudiante page loaded.");
    </script>
@stop
