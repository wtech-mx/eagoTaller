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
                        <label for="fecha_man" class="col-sm-2 control-label">Fecha Servicio: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="fecha_man" name="fecha_man" placeholder="Fecha Servicio ">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <?php 
                                                $sql_clientes=mysqli_query($con,"select * from cliente where status=1 order by nombre");
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
                                $vehiculos=mysqli_query($con,"select * from vehiculo");
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
                        <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" data-live-search="true" name="vehiculo" id="vehiculo">
                               <!--  <option value="">--- SELECCIONA ---</option> -->
                            <?php
                                require_once ("config/config.php");
                                $vehiculos=mysqli_query($con,"select * from vehiculo");
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
                        <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" data-live-search="true" name="vehiculo" id="vehiculo">
                               <!--  <option value="">--- SELECCIONA ---</option> -->
                            <?php
                                require_once ("config/config.php");
                                $vehiculos=mysqli_query($con,"select * from vehiculo");
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
                        <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" data-live-search="true" name="vehiculo" id="vehiculo">
                               <!--  <option value="">--- SELECCIONA ---</option> -->
                            <?php
                                require_once ("config/config.php");
                                $vehiculos=mysqli_query($con,"select * from vehiculo");
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
                        <label for="datos" class="col-sm-2 control-label">Descripción: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="datos" name="datos" placeholder="Descripción">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="trasladistas" class="col-sm-2 control-label">Trasladista: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="trasladistas" name="trasladistas" placeholder="Trasladista">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gasolina" class="col-sm-2 control-label">Gasolina: </label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" id="gasolina" name="gasolina" placeholder="Gasolina">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otro" class="col-sm-2 control-label">Otro: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="otro" name="otro" placeholder="Otro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aplaca" class="col-sm-2 control-label">Alta placa: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="aplaca" name="aplaca" placeholder="Alta placa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bplaca" class="col-sm-2 control-label">Baja placa: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="bplaca" name="bplaca" placeholder="Baja placa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rplaca" class="col-sm-2 control-label">Reposición placa: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="rplaca" name="rplaca" placeholder="Reposición placa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tarjeta" class="col-sm-2 control-label">Reposición tarjeta: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="tarjeta" name="tarjeta" placeholder="Reposición tarjeta">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="subtotal" class="col-sm-2 control-label">Subtotal: </label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="eago" class="col-sm-2 control-label">EAGO: </label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" id="eago" name="eago" placeholder="EAGO">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Total: </label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" id="total" name="total" placeholder="Total">
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