  <!-- Modal de edición de riesgo -->
<div class="modal fade" id="editRisk{{$riesgo->id_riesgo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar riesgo</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('matrizriesgo.update', $riesgo->id_riesgo ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <form action="{{ route('matrizriesgo.update', $riesgo->id_riesgo ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del riesgo</label>
                                <input type="text" class="form-control" name="nombre_riesgo" id="" aria-describedby="helpId" placeholder="" value="{{$riesgo->nombre_riesgo}}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Descripción del riesgo</label>
                                <textarea type="text" class="form-control" name="descripcion_riesgo" id="" aria-describedby="helpId" placeholder="">{{$riesgo->descripcion_riesgo}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Probabilidad de ocurrencia</label>
                                <select name="prob_ocurrencia">
                                    <option value="">Seleccionar</option>
                                    <option value="1" {{$riesgo->prob_ocurrencia == 1 ? 'selected' : ''}}>Raro</option>
                                    <option value="2" {{$riesgo->prob_ocurrencia == 2 ? 'selected' : ''}}>Improbable</option>
                                    <option value="3" {{$riesgo->prob_ocurrencia == 3 ? 'selected' : ''}}>Posible</option>
                                    <option value="4" {{$riesgo->prob_ocurrencia == 4 ? 'selected' : ''}}>Probable</option>
                                    <option value="5" {{$riesgo->prob_ocurrencia == 5 ? 'selected' : ''}}>Casi Seguro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Impacto</label>
                                <select name="impacto">
                                    <option value="">Seleccionar</option>
                                    <option value="1" {{$riesgo->impacto == 1 ? 'selected' : ''}}>Insignificante</option>
                                    <option value="2" {{$riesgo->impacto == 2 ? 'selected' : ''}}>Menor</option>
                                    <option value="3" {{$riesgo->impacto == 3 ? 'selected' : ''}}>Moderado</option>
                                    <option value="4" {{$riesgo->impacto == 4 ? 'selected' : ''}}>Mayor</option>
                                    <option value="5" {{$riesgo->impacto == 5 ? 'selected' : ''}}>Catastrófico</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de control</label>
                                <select name="tipo_de_control">
                                    <option value="">Seleccionar</option>
                                    <option value="preventivo" {{$riesgo->tipo_de_control == 'preventivo' ? 'selected' : ''}}>Preventivo</option>
                                    <option value="correctivo" {{$riesgo->tipo_de_control == 'correctivo' ? 'selected' : ''}}>Correctivo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de Riesgo</label>
                                <select name=tipo_de_riesgo>
                                    <option value="">Seleccionar</option>
                                    <option value="logico" {{$riesgo->tipo_de_riesgo == 'logico' ? 'selected' : ''}}>Lógico</option>
                                    <option value="fisico" {{$riesgo->tipo_de_riesgo == 'fisico' ? 'selected' : ''}}>Físico</option>
                                    <option value="locativo" {{$riesgo->tipo_de_riesgo == 'locativo' ? 'selected' : ''}}>Locativo</option>
                                    <option value="legal" {{$riesgo->tipo_de_riesgo == 'legal' ? 'selected' : ''}}>Legal</option>
                                    <option value="reputacional" {{$riesgo->tipo_de_riesgo == 'reputacional' ? 'selected' : ''}}>Reputacional</option>
                                    <option value="financiero" {{$riesgo->tipo_de_riesgo == 'financiero' ? 'selected' : ''}}>Financiero</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">¿Posee una herramienta o mecanismo para ejercer el control?</label>
                                <select name="hmec">
                                    <option value="">Seleccionar</option>
                                    <option value="15" {{$riesgo->hmec == 15 ? 'selected' : ''}}>Sí</option>
                                    <option value="0" {{$riesgo->hmec == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">¿Existen manuales, instructivos o procedimientos para el manejo del control?</label>
                                <select name="mipc">
                                    <option value="">Seleccionar</option>
                                    <option value="15" {{$riesgo->mipc == 15 ? 'selected' : ''}}>Sí</option>
                                    <option value="0" {{$riesgo->mipc == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">¿En el tiempo que lleva el control ha demostrado ser efectivo?</label>
                                <select name="tce">
                                    <option value="">Seleccionar</option>
                                    <option value="30" {{$riesgo->tce == 30 ? 'selected' : ''}}>Sí</option>
                                    <option value="0" {{$riesgo->tce == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">¿Están definidos los responsables para la ejecución del control y del seguimiento?</label>
                                <select name="rec">
                                    <option value="">Seleccionar</option>
                                    <option value="15" {{$riesgo->rec == 15 ? 'selected' : ''}}>Sí</option>
                                    <option value="0" {{$riesgo->rec == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">¿La frecuencia de la ejecución del control y seguimiento es adecuada?</label>
                                <select name="fec">
                                    <option value="">Seleccionar</option>
                                    <option value="25" {{$riesgo->fec == 25 ? 'selected' : ''}}>Sí</option>
                                    <option value="0" {{$riesgo->fec == 0 ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Mitigaciones</label>
                                <textarea type="text" class="form-control" name="mitigaciones" id="" aria-describedby="helpId" placeholder="">{{$riesgo->mitigaciones}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Responsable</label>
                                <input type="text" class="form-control" name="responsable" id="" aria-describedby="helpId" placeholder="" value="{{$riesgo->responsable}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar Riesgo</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="deleteRisk{{$riesgo->id_riesgo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar el riesgo?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('matrizriesgo.destroy', ['id' => $riesgo->id_riesgo]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de significado de las siglas -->
<div class="modal fade" id="siglas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Significado de las siglas de la tabla</h5>
            </div>
            <div class="modal-body">
                <p><strong>TdR:</strong> Tipo de riesgo</p>
                <p><strong>TdI:</strong> Tipo de impacto</p>
                <p><strong>HMC:</strong> ¿Posee una herramienta o mecanismo para ejercer el control?</p>
                <p><strong>MIPC:</strong> ¿Existen manuales, instructivos o procedimientos para el manejo del control?</p>
                <p><strong>TCE:</strong> ¿En el tiempo que lleva el control ha demostrado ser efectivo?</p>
                <p><strong>ERC:</strong> ¿Están definidos los responsables para la ejecución del control y del seguimiento?</p>
                <p><strong>FEC:</strong> ¿La frecuencia de la ejecución del control y seguimiento es adecuada?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
