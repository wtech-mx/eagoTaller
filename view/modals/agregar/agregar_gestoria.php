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
                        <label for="fecha_ges" class="col-sm-2 control-label">Fecha Servicio: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="fecha_ges" name="fecha_ges" placeholder="Fecha Servicio ">
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
                        <div class="col-sm-4">
                                        <select class="form-control" name="vehiculo" id="vehiculo" required>
                                            <?php 
                                            $sql_vehiculos=mysqli_query($con,"select * from vehiculo");
                                                while ($rw=mysqli_fetch_array($sql_vehiculos)){
                                                    $idvehiculo=$rw['id'];
                                                    $marca_vehiculo=$rw['marca'];
                                                ?>
                                                <option value="<?php echo $idvehiculo;?>"><?php echo $marca_vehiculo;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                    </div>
                    <div class="form-group">
                        <label for="carro" class="col-sm-2 control-label">Placa: </label>
                        <div class="col-sm-4">
                                        <select class="form-control" name="carro" id="carro" required>
                                            <?php 
                                            $sql_carros=mysqli_query($con,"select * from cliente");
                                                while ($rw=mysqli_fetch_array($sql_carros)){
                                                    $idcarro=$rw['id'];
                                                    $placa_carro=$rw['placa'];
                                                ?>
                                                <option value="<?php echo $idcarro;?>"><?php echo $placa_carro;?></option>
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
                            <input type="text" class="form-control" id="otro" name="otro" placeholder="Otro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aplaca" class="col-sm-2 control-label">Alta placa: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="aplaca" name="aplaca" placeholder="Alta placa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bplaca" class="col-sm-2 control-label">Baja placa: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="bplaca" name="bplaca" placeholder="Baja placa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rplaca" class="col-sm-2 control-label">Reposición placa: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="rplaca" name="rplaca" placeholder="Reposición placa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tarjeta" class="col-sm-2 control-label">Reposición tarjeta: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="tarjeta" name="tarjeta" placeholder="Reposición tarjeta">
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