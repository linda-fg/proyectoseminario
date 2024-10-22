<form id="frmActualizarDatosPersonales" method="POST" onsubmit="return actualizarDatosPersonales()">
    <!-- Modal -->
    <div class="modal fade" id="modalActualizarDatosPersonales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar datos personales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="nombreInicio">Nombre</label>
                    <input type="text" name="nombreInicio" id="nombreInicio" class="form-control">
                    <label for="apellidoInicio">Apellido</label>
                    <input type="text" name="apellidoInicio" id="apellidoInicio" class="form-control">
                    <label for="direccionInicio">Direccion</label>
                    <input type="text" name="direccionInicio" id="direccionInicio" class="form-control">
                    <label for="telefonoInicio">Telefono</label>
                    <input type="text" name="telefonoInicio" id="telefonoInicio" class="form-control">
                    <label for="correoInicio">Correo</label>
                    <input type="mail" name="correoInicio" id="correoInicio" class="form-control">
                    <label for="fechaInicio">Fecha de nacimiento</label>
                    <input type="date" name="fechaInicio" id="fechaInicio" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-outline-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>