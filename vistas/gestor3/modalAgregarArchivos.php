<form id="frmArchivos" method="POST" onsubmit="return agregarArchivoGestor()">
				<!-- Modal -->
				<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Subir Documentos</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div class="col-sm-12"> 
				        	<label>Nombre del proyecto</label>
				        	<?php 
				        		$sql="SELECT id_proyecto,
										       nombre 
									FROM t_cat_equipo 
									WHERE id_usuario = '$idUsuario'";
								
								$respuesta = mysqli_query($conexion, $sql);
				        	?>
							<select name="categoriasArchivos" id="categoriasArchivos" class="selectpicker form-control" data-live-search="true" required>
								<option value="">Seleccione</option>
							    <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
							        <option value="<?php echo $mostrar['id_proyecto']; ?>"> <?php echo $mostrar['nombre']; ?> </option>
							    <?php } ?>
							</select>
				        </div>

				        <div class="col-sm-12"> 
				        	<label>Nombre del cliente</label>
				        	<?php 

		                          $sql = "SELECT 
		                                        id_cliente,
		                                        CONCAT(nombre, ' ', apellido, ',  ', direccion) AS nombre
		                                  FROM 
		                                        t_clientes ORDER BY nombre";
		                          $respuesta = mysqli_query($conexion, $sql);
		                      ?>
		                      <select name="idPersona" id="idPersona" class="selectpicker form-control" data-live-search="true" required>
		                        <option value="">Seleccione</option>
		                        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
		                          <option value="<?php echo $mostrar['id_cliente']; ?>"> <?php echo $mostrar['nombre']; ?> </option>
		                      <?php   } ?>
		                      </select>
				        </div>

				        <div class="col-sm-12">
				        	<label>Proyecto</label>
				        	<div id="categoriasLoad"></div>
				        	<label>Subir Archivo</label>
				        	<input type="file" name="archivos[ ]" id="archivos[ ]" class="form-control" multiple="">
				        </div>
				        
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
				        <button class="btn btn-outline-primary">Aceptar</button>
				      </div>
				    </div>
				  </div> 
				</div>
</form>