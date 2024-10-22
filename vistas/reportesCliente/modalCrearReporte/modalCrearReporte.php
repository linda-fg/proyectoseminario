<form id="frmNuevoReporte1" method="POST" onsubmit="return agregarNuevoReporte1()">
        <!-- Modal -->
        <div class="modal fade" id="modalCrearReporte1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <label for="idProyectoC">Proyectos </label>
                    <?php 
                        $idUsuario = $_SESSION['usuario']['id'];
                        $sql = "SELECT id_proyecto, nombre FROM t_cat_equipo ORDER BY nombre";
                        
                        $respuesta = mysqli_query($conexion, $sql);
                    ?>
                      <select name="idProyectoC" id="idProyectoC" class="selectpicker form-control" data-live-search="true" required>
                        <option value="">Seleccione</option>
                        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                            <option value="<?php echo $mostrar['id_proyecto']; ?>"> <?php echo $mostrar['nombre']; ?> </option>
                          
                       <?php } ?>
                      </select>
                    <label for="descripcionC">Descripcion</label>
                    <textarea name="descripcionC" id="descripcionC" class="form-control" required> </textarea>
              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-outline-primary">Crear</button>
              </div>
            </div>
          </div>
        </div>

</form>