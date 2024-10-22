
<!-- Modal -->
<form id="frmAgregarClientes" method="POST" onsubmit="return agregarNuevoClientes()">
  <div class="modal fade" id="modalAgregarClientes" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Agragar Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
              <label for="nombreI">Nombre</label>
              <input type="text" class="form-control" id="nombreI" name="nombreI" required>
            </div>
            <div class="col-sm-4">
              <label for="apellidoI">Apellido</label>
              <input type="text" class="form-control" id="apellidoI" name="apellidoI" required>
            </div>
            <div class="col-sm-4">
              <label for="direccionI">Direccion</label>
              <input type="text" class="form-control" id="direccionI" name="direccionI" required>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label for="fechaI">Fecha de nacimiento</label>
              <input type="date" class="form-control" id="fechaI" name="fechaI">
            </div>
            <div class="col-sm-4">
              <label for="sexoI">Sexo</label>
              <select class="form-control" id="sexoI" name="sexoI" required>
                <option value=""></option>
                <option value="F">Femenimo</option>
                <option value="M">Masculino</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="telefonoI">Telefono</label>
              <input type="text" class="form-control" id="telefonoI" name="telefonoI" required>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label for="correoI">Correo</label>
              <input type="mail" class="form-control" id="correoI" name="correoI" required>
            </div>
          </div> 
      </div>
      <div class="modal-footer">
        <span class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</span>
        <button class="btn btn-outline-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>