
  <!-- Modal -->
  <div class="modal fade" id="createProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Proyecto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="" class="form-label">Nombre del proyecto</label>
            <input type="text"
              class="form-control" name="nombre_proyecto" id="" aria-describedby="helpId" placeholder="" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Descripción del proyecto</label>
            <textarea type="text"
              class="form-control" name="descripcion_proyecto" id="" aria-describedby="helpId" placeholder="" required>
            </textarea>
          <div class="mb-3">
            <label for="" class="form-label">Imagen del proyecto</label>
            <input type="file"
              class="form-control" name="imagen_proyecto" id="" aria-describedby="helpId" placeholder="" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear proyecto</button>
        </div>
    </form>
      </div>
    </div>
  </div>