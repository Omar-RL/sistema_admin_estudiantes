@extends('adminlte::page')

@section('title', 'Detalle del Estudiante')

@section('content_header')
    <h1>Detalle del Estudiante: {{ $estudiante->nombre }} {{ $estudiante->apellido }}</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Información del Estudiante</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>ID Estudiante:</label>
                <p class="form-control-static">{{ $estudiante->id }}</p>
            </div>
            <div class="form-group">
                <label>Nombre:</label>
                <p class="form-control-static">{{ $estudiante->nombre }}</p>
            </div>
            <div class="form-group">
                <label>Apellido:</label>
                <p class="form-control-static">{{ $estudiante->apellido }}</p>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <p class="form-control-static">{{ $estudiante->email }}</p>
            </div>
            <div class="form-group">
                <label>Cursos:</label>
                @if($estudiante->cursos->isNotEmpty())
                    <ul>
                        @foreach($estudiante->cursos as $curso)
                            <li>{{ $curso->nombre }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="badge badge-secondary">Sin cursos</span>
                @endif
            </div>
        </div>
        <div class="box-footer">
            <a href="{{ route('estudiantes.index') }}" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Volver
            </a>
            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">
                <i class="fa fa-edit"></i> Editar
            </a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('js')
    <script> console.log("Show Estudiante page loaded."); </script>
@stop
