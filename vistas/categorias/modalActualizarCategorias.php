<form id="frmCategoria" method="POST" onsubmit="return actualizarCategoria()">
      <!-- Modal -->
      <div class="modal fade" id="modalActualizarCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nombre Del Proyecto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <input type="" name="idCategoria" id="idCategoria" hidden>
                  
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="categoriaU">Nombres</label>
                        <input type="text" name="categoriaU" id="categoriaU" class="form-control" >
                      </div>
                  
                    </div>
                  
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="descripcionU">Descripcions</label>
                        <textarea name="descripcionU" id="descripcionU" class="form-control" ></textarea>
                      </div>
                    </div>


            </div>
            <div class="modal-footer">
              
              <button class="btn btn-outline-warning" >Actualizar</button>
            </div>
          </div>
        </div>
      </div>
</form>