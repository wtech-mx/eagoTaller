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
                        <label for="fecha_tras" class="col-sm-2 control-label">Fecha Traslado: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="fecha_tras" name="fecha_tras" placeholder="Fecha Traslado: ">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="cliente" id="cliente" >
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
                    <label for="taller" class="col-sm-2 control-label">Taller: </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="taller" id="taller" >
                                            <?php 
                                                $sql_tallers=mysqli_query($con,"select * from taller where estado=1 order by nombre");
                                                while ($rw=mysqli_fetch_array($sql_tallers)){
                                                    $idtaller=$rw['id'];
                                                    $nombre_taller=$rw['nombre'];
                                                ?>
                                                <option value="<?php echo $idtaller;?>"><?php echo $nombre_taller;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                    </div>
                    <div class="form-group">
                        <label for="datos" class="col-sm-2 control-label">Descripcion: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="datos" name="datos" placeholder="Datos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="trasladista" class="col-sm-2 control-label">Trasladista </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="trasladista" id="trasladista" required>
                                            <?php 
                                                $sql_trasladistas=mysqli_query($con,"select * from trasladista where status=1 order by nombre");
                                                while ($rw=mysqli_fetch_array($sql_trasladistas)){
                                                    $idtrasladista=$rw['id'];
                                                    $nombre_trasladista=$rw['nombre']." ".$rw['apellido'];
                                                ?>
                                                <option value="<?php echo $idtrasladista;?>"><?php echo $nombre_trasladista;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                    </div>
                    <div class="form-group">
                        <label for="vendedor" class="col-sm-2 control-label">Vendedor: </label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="vendedor" name="vendedor" placeholder="Vendedor">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="origen" class="col-sm-2 control-label">Recoger en: </label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="origen" name="origen" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="destino" class="col-sm-2 control-label">Destino: </label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="destino" name="destino" placeholder="destino">
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