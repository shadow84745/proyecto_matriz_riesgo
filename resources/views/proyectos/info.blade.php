<!-- Modal crear proyecto -->
<div class="modal fade" id="createProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear Proyecto</h5>
              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="" class="form-label">Nombre del proyecto</label>
                      <input type="text" class="form-control" name="nombre_proyecto" id="" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                      <label for="" class="form-label">Descripción del proyecto</label>
                      <input type="text" class="form-control" name="descripcion_proyecto" id="" aria-describedby="helpId" placeholder="" required>
                  </div>
                  <div class="mb-3">
                      <label for="" class="form-label">Imagen del proyecto</label>
                      <input type="file" class="form-control" name="imagen_proyecto" id="" aria-describedby="helpId" placeholder="" required>
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

<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="delete{{$proyecto->id_proyecto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Borrar Proyecto</h5>
              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{route('home.destroy', $proyecto->id_proyecto)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                  <label for="" class="form-label">Nombre del proyecto</label>
                  <p>¿Estás seguro que deseas eliminar el proyecto?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Borrar</button>
              </div>
          </form>
      </div>
  </div>
</div>


<!-- Modal de editar de proyecto -->
<div class="modal fade" id="edit{{$proyecto->id_proyecto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Proyecto</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('home.update', $proyecto->id_proyecto)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del proyecto</label>
                        <input type="text" class="form-control" name="nombre_proyecto" id="" aria-describedby="helpId" placeholder="{{$proyecto->nombre_proyecto}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Descripción del proyecto</label>
                        <input type="text" class="form-control" name="descripcion_proyecto" id="" aria-describedby="helpId" placeholder="{{$proyecto->descripcion_proyecto}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Imagen del proyecto</label>
                        <input type="file" class="form-control" name="imagen_proyecto" id="" aria-describedby="helpId" placeholder="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar proyecto</button>
                </div>
            </form>
        </div>
    </div>
  </div>