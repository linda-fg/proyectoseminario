<form id="frmProyectos" method="POST" onsubmit="return agregarProyecto()">
        <!-- Modal -->
        <div class="modal fade" id="modalCrearProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <label for="idAgregaProyecto">Nombre del Proyecto </label>
                     <textarea name="idAgregaProyecto" id="idAgregaProyecto" class="form-control" required> </textarea>
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required> </textarea>
              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-outline-primary">Crear</button>
              </div>
            </div>
          </div>
        </div>

</form>