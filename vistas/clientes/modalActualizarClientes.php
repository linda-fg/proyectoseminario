
<!-- Modal -->
<form id="frmActualizarClientes" method="POST" onsubmit="return actualizarClientes()">
  <div class="modal fade" id="modalActualizarClientes" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Actualizar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="" name="idCliente" id="idCliente" hidden>
          <div class="row">
            <div class="col-sm-4">
              <label for="nombrec">Nombre</label>
              <input type="text" class="form-control" id="nombrec" name="nombrec" >
            </div>
            <div class="col-sm-4">
              <label for="apellidoc">Apellido</label>
              <input type="text" class="form-control" id="apellidoc" name="apellidoc" >
            </div>
            <div class="col-sm-4">
              <label for="direccionc">Direccion</label>
              <input type="text" class="form-control" id="direccionc" name="direccionc" >
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label for="fechac">Fecha de nacimiento</label>
              <input type="date" class="form-control" id="fechac" name="fechac" >
            </div>
            <div class="col-sm-4">
              <label for="sexoc">Sexo</label>
              <select class="form-control" id="sexoc" name="sexoc" >
                <option value=""></option>
                <option value="F">Femenimo</option>
                <option value="M">Masculino</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="telefonoc">Telefono</label>
              <input type="text" class="form-control" id="telefonoc" name="telefonoc" >
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label for="correoc">Correo</label>
              <input type="mail" class="form-control" id="correoc" name="correoc" >
            </div>
          </div>      
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-warning">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>