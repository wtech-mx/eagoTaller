<div class="form-group">
                    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <?php 
                                            require_once ("config/config.php");
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

            <?php            
                    $marcados = mysqli_query($con, "SELECT * FROM vehiculo_cliente WHERE idvehiculo=$id");
                    $valores=array();
                    while ($per = $marcados->fetch_object())
                    {
                        array_push($valores, $per->idvehiculo);
                    }
                    while ($reg = $vehiculos->fetch_object())
                    {
                        $sw=in_array($reg->id,$valores)?'checked':'';
                        echo '<li> <input id="vehiculo" type="checkbox" '.$sw.'  name="vehiculo[]" value="'.$reg->id.'">'.$reg->nombre.'</li>';
                    }
            ?>
            </select>
        </div>
    </div>