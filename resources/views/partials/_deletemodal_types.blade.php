{{-- Modal --}}
<div class="modal fade" id="type-card-modal-{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di eliminare:
        <br>
        <ul>
            <li>{{$type->label}}</li>
            <li>{{$type->color}}</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        

        <form action="{{ route('types.destroy', $type)}}" method="POST">
            @csrf
            @method('delete')
        
            <button class="btn btn-danger">Elimina</button>
        </form>
      </div>
    </div>
  </div>
</div>