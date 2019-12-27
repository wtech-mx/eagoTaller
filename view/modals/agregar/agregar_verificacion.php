    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>

    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nuevo Servicio</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_veri" class="col-sm-2 control-label">Fecha Verificación: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="fecha_veri" name="fecha_veri" placeholder="Fecha Verificación: ">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <?php 
                                                $sql_clientes=mysqli_query($con,"select * from cliente");
                                                while ($rw=mysqli_fetch_array($sql_clientes)){
                                                    $idcliente=$rw['id'];
                                                    $nombre_cliente=$rw['nombre']." ".$rw['apellido'];
                                                ?>
                                                <option value="<?php echo $idcliente;?>"><?php echo $nombre_cliente;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                    </div>
                    <div class="form-group">
                        <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" data-live-search="true" name="vehiculo" id="vehiculo">
                               <!--  <option value="">--- SELECCIONA ---</option> -->
                            <?php
                                require_once ("config/config.php");
                                $vehiculos=mysqli_query($con,"select * from vehiculo  where estado=1 order by patente");
                                while ($rw=mysqli_fetch_array($vehiculos)) {
                            ?>
                                <option value="<?php echo $rw['id']?>"><?php echo $rw['patente']?></option>
                            <?php 
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datos" class="col-sm-2 control-label">Datos: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="datos" name="datos" placeholder="Datos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="derechos" class="col-sm-2 control-label">Derechos: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="derechos" name="derechos" placeholder="Derechos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otros" class="col-sm-2 control-label">Otros: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="otros" name="otros" placeholder="Otros">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="trasladistas" class="col-sm-2 control-label">Trasladista: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="trasladistas" name="trasladistas" placeholder="Trasladista">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vendedor" class="col-sm-2 control-label">Vendedor: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="vendedor" name="vendedor" placeholder="Vendedor">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar_datos" class="btn btn-primary">Agregar</button>
                </div>
            </form>
            <!-- /end form  -->
            </div>
        </div>
    </div>
    <!-- End Form Modal -->