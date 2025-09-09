@extends('adminlte::page')

@section('title', 'Lista de Estudiantes')

@section('content_header')
    <h1 style="display: inline;">Lista de Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary" style="margin-left: 20px;">
        <i class="fa fa-plus"></i> Nuevo Estudiante
    </a>

    @if(session('success'))
        <div class="alert alert-custom-success">
            <i class="fa fa-check"></i> {{ session('success') }}
        </div>
    @endif
@stop

@section('content')
    <table id="estudiantes-table" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Cursos</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>
                        @if($estudiante->cursos->isNotEmpty())
                            <ul style="padding-left: 18px; margin: 0;">
                                @foreach($estudiante->cursos as $curso)
                                    <li>{{ $curso->nombre }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="badge badge-secondary">Sin cursos</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info" title="Ver">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#modal-delete-{{ $estudiante->id }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Cursos</th>
                <th>Operaciones</th>
            </tr>
        </tfoot>
    </table>

    @include('estudiantes.delete') <!-- Modal de eliminación -->
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .alert-custom-success {
            background-color: #d4edda;
            color: #2f1557;
            border-color: #743297;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .alert-custom-success i {
            margin-right: 5px;
        }
    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#estudiantes-table').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ entradas",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
@stop
