<div class="modal fade" id="modal-delete-{{$pos->id_producto}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    {{ Form::open(['action' => ['App\Http\Controllers\productoController@destroy', $pos->id_producto], 'method' => 'delete']) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Eliminar producto y/o servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Confirme si desea eliminar el producto y/o servicio</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>

