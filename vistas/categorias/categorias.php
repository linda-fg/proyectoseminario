<form id="frmCategoria" method="POST" onsubmit="return agregarCategoria()">
      <!-- Modal -->
      <div class="modal fade" id="modalCategorias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nombre Del Proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                       <div class="col-sm-12">
                        <label for="categoria">Nombre</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" required>
                      </div>

                      <!--
                      <div class="col-sm-12">
                        <label for="descripcionP">Descripcion</label>
                        <textarea name="descripcionP" id="descripcionP" class="form-control" required></textarea>
                      </div> -->
              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-outline-primary">Crear</button>
              </div>
            </div>
          </div>
        </div>
</form>