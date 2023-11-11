
  <!-- Modal -->
  <div class="modal fade" id="createRisk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo riesgo a la matriz</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('matrizriesgo.store', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="" class="form-label">Nombre del riesgo</label>
            <input type="text"
              class="form-control" name="nombre_riesgo" id="" aria-describedby="helpId" placeholder="" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Descripción del riesgo</label>
            <textarea type="text"
              class="form-control" name="descripcion_riesgo" id="" aria-describedby="helpId" placeholder="" required>
            </textarea>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Probabilidad de ocurrencia</label>
            <select name="prob_ocurrencia" required>
              <option value="">Seleccionar</option>
              <option value="1">Raro</option>
              <option value="2">Improbable</option>
              <option value="3">Posible</option>
              <option value="4">Probable</option>
              <option value="5">Casi Seguro</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Impacto</label>
            <select name="impacto" required>
              <option value="">Seleccionar</option>
              <option value="1">Insignificante</option>
              <option value="2">Menor</option>
              <option value="3">Moderado</option>
              <option value="4">Mayor</option>
              <option value="5">Catastrofico</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Tipo de control</label>
            <select name="tipo_de_control" required>
              <option value="">Seleccionar</option>
              <option value="preventivo">Preventivo</option>
              <option value="correctivo">Correctivo</option>
            </select>
          </div><div class="mb-3">
            <label for="" class="form-label">Tipo de Riesgo</label>
            <select name=tipo_de_riesgo required>
              <option value="">Seleccionar</option>
              <option value="logico">Lógico</option>
              <option value="fisico">Físico</option>
              <option value="locativo">Locativo</option>
              <option value="legal">Legal</option>
              <option value="reputacional">Reputacional</option>
              <option value="financiero">Financiero</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">¿Posee una herramienta o mecanismo para ejercer el control?</label>
            <select name="hmec" required>
              <option value="">Seleccionar</option>
              <option value="15">Si</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">¿Existen manuales, instructivos o procedimientos para el manejo del control?</label>
            <select name="mipc" required>
              <option value="">Seleccionar</option>
              <option value="15">Si</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">¿En el tiempo que lleva el control ha demostrado ser efectivo?</label>
            <select name="tce" required>
              <option value="">Seleccionar</option>
              <option value="30">Si</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">¿Están definidos los responsables para la ejecución del control y del seguimiento?</label>
            <select name="rec" required>
              <option value="">Seleccionar</option>
              <option value="15">Si</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">¿La frecuencia de la ejecución del control y seguimiento es adecuada?</label>
            <select name="fec" required>
              <option value="">Seleccionar</option>
              <option value="25">Si</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Mitigaciones</label>
            <textarea type="text"
              class="form-control" name="mitigaciones" id="" aria-describedby="helpId" placeholder="" required>
            </textarea>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Responsable</label>
            <input type="text"
              class="form-control" name="responsable" id="" aria-describedby="helpId" placeholder="" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear Riesgo</button>
        </div>
    </form>
      </div>
    </div>
  </div>