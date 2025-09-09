@extends('adminlte::page')

@section('title', 'Agregar Estudiante')

@section('content_header')
    <h1>Agregar Estudiante</h1>
    <!-- Notificación de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Notificación de errores -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop

@section('content')
    <form action="{{ route('estudiantes.store') }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea guardar este estudiante?');">
        @csrf

        <!-- Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input 
                type="text" 
                class="form-control @error('nombre') is-invalid @enderror" 
                id="nombre" 
                name="nombre" 
                value="{{ old('nombre') }}" 
                placeholder="Ingrese el nombre del estudiante" 
                required>
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Apellido -->
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input 
                type="text" 
                class="form-control @error('apellido') is-invalid @enderror" 
                id="apellido" 
                name="apellido" 
                value="{{ old('apellido') }}" 
                placeholder="Ingrese el apellido del estudiante" 
                required>
            @error('apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="email" 
                name="email" 
                value="{{ old('email') }}" 
                placeholder="Ingrese el correo del estudiante" 
                required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Cursos -->
        <div class="form-group">
            <label for="cursos">Cursos</label>
            <select name="cursos[]" id="cursos" class="form-control" multiple>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}" {{ in_array($curso->id, old('cursos', [])) ? 'selected' : '' }}>
                        {{ $curso->nombre }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Mantén presionada la tecla Ctrl (o Cmd) para seleccionar múltiples cursos.</small>
        </div>

        <!-- Botón de guardar -->
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar
        </button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('js')
    <script>
        console.log("Página de creación de estudiante cargada.");
    </script>
@stop
