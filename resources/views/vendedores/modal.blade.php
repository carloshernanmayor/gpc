<div class="modal fade" id="modal-delete-{{$pos->id_vendedor}}" tabindex="-1" arialabelledby="
ModalLabel" aria-hidden="true">
{{Form::Open(array('action'=>array('App\Http\Controllers\vendedorController@destroy',$pos->id_vendedor),'method'=>'delete'))}}
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Inhabilitar Vendedor</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="
Close"></button>
</div>
<div class="modal-body">
<p>Confirme si desea Inhabilitar El Vendedor</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
<button data-toggle="modal" data-target="#modal-delete2" type="submit" class="btn btn-primary">Confirmar</button>
</div>
</div>
</div>
</div>
{{Form::Close()}}