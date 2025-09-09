@foreach($estudiantes as $estudiante)
    <div class="modal fade" id="modal-delete-{{ $estudiante->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $estudiante->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $estudiante->id }}">Eliminar Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p>
                        ¿Está seguro de que desea eliminar al estudiante 
                        <strong>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</strong> 
                        (Email: <strong>{{ $estudiante->email }}</strong>) de manera permanente?
                    </p>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
