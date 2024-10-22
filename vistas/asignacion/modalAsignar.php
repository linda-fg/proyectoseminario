<form id="frmAsignarEquipo" method="post" onsubmit="return asignarEquipo()">
    <!-- Modal -->
    <div class="modal fade" id="modalAsignarEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Nombre del cliente</label>
                        <?php 
                            $sql = "SELECT 
                                         id_cliente,
                                        CONCAT(nombre, ' ', apellido, ',  ', direccion) AS nombre
                                  FROM 
                                        t_clientes ORDER BY nombre";
                            $respuesta = mysqli_query($conexion, $sql);    
                        ?>
                        <select name="idPersona1" id="idPersona1" 
                        class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Selecciona una opcion</option>
                            <?php 
                                while ($mostrar = mysqli_fetch_array($respuesta)) {
                            ?>
                            <option value="<?php echo $mostrar['id_cliente'];?>">
                                <?php echo $mostrar['nombre'];?>
                            </option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Nombre del Proyecto</label>
                        <?php 
                            $sql = "SELECT id_proyecto, nombre FROM t_cat_equipo ORDER BY nombre";
                            $respuesta = mysqli_query($conexion, $sql);
                        ?>
                        <select name="idProyecto1" id="idProyecto1" 
                        class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Selecciona una opcion</option>
                            <?php while ($mostrar = mysqli_fetch_array($respuesta)) {?>
                            <option value="<?php echo $mostrar['id_proyecto'];?>">
                                <?php echo $mostrar['nombre'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                      <div class="col-sm-4">
                        <label for="empresa1">Empresa</label>
                        <input type="text" name="empresa1" id="empresa1" class="form-control" required>
                      </div>
                      <div class="col-sm-4">
                        <label for="direccion1">Direccion</label>
                        <input type="text" name="direccion1" id="direccion1" class="form-control" required>
                      </div>
                      <div class="col-sm-4">
                        <label for="telefono1">Telefono</label>
                        <input type="text" name="telefono1" id="telefono1" class="form-control" required>
                      </div>
                    </div>
                


                  
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="descripcion1">Descripcion</label>
                        <textarea name="descripcion1" id="descripcion1" class="form-control" required></textarea>
                      </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-outline-primary">Asignar</button>
            </div>
            </div>
        </div>
    </div>
</form>

