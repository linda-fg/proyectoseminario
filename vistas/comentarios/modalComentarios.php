				<!-- Modal -->
<form id="frmComentarios" method="POST" onsubmit="return AgregarComentario()">
	<div class="modal fade" id="modalAgregarComentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	 <label for="comentarioNombreCliente">Nombre del cliente</label>
                      <?php 
                          $sql = "SELECT 
                                        id_cliente,
                                        CONCAT(nombre, ' ', apellido, ',  ', direccion) AS nombre
                                  FROM 
                                        t_clientes ORDER BY nombre";
                          $respuesta = mysqli_query($conexion, $sql);
                      ?>
                      <select name="comentarioNombreCliente" id="comentarioNombreCliente" class="selectpicker form-control" data-live-search="true" required>
                        <option value="">Seleccione</option>
                        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                          <option value="<?php echo $mostrar['id_cliente']; ?>"> <?php echo $mostrar['nombre']; ?> </option>
                      <?php   } ?>
                      </select>

	        <label for="comentarioCliente">Agergar Comentario</label>
	                 	<textarea name="comentarioCliente" id="comentarioCliente" class="form-control" required></textarea>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
	        <button class="btn btn-outline-primary">Aceptar</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>