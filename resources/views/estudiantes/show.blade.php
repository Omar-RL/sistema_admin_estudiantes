@extends('adminlte::page')

@section('title', 'Detalle del Estudiante')

@section('content_header')
    <h1>Detalle del Estudiante</h1>
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-user-graduate"></i> {{ $estudiante->nombre }} {{ $estudiante->apellido }}
            </h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong><i class="fa fa-id-badge"></i> ID Estudiante:</strong>
                    <p class="text-muted">{{ $estudiante->id }}</p>
                </div>
                <div class="col-md-6">
                    <strong><i class="fa fa-envelope"></i> Email:</strong>
                    <p class="text-muted">{{ $estudiante->email }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong><i class="fa fa-user"></i> Nombre:</strong>
                    <p class="text-muted">{{ $estudiante->nombre }}</p>
                </div>
                <div class="col-md-6">
                    <strong><i class="fa fa-user"></i> Apellido:</strong>
                    <p class="text-muted">{{ $estudiante->apellido }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <strong><i class="fa fa-book"></i> Cursos:</strong>
                    @if($estudiante->cursos->isNotEmpty())
                        <ul class="list-group list-group-flush mt-2">
                            @foreach($estudiante->cursos as $curso)
                                <li class="list-group-item">
                                    <i class="fa fa-check-circle text-success"></i> {{ $curso->nombre }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span class="badge badge-secondary mt-2">Sin cursos asignados</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-footer">
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
    <script>
        console.log("Show Estudiante page loaded (versión profesional).");
    </script>
@stop
