<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from estetica where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);

                $idcliente=$rw['idcliente'];
                $clientes=mysqli_query($con, "select * from cliente where id=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $patente_vehiculo=$vehiculo_rw['patente'];

                $datos=$rw['datos'];
                $trasladistas=$rw['trasladistas'];
                $gasolina=$rw['gasolina'];
                $otros=$rw['otros'];
                $vendedor=$rw['vendedor'];
                $fecha_carga=$rw['fecha_carga'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="idcliente" class="col-sm-4 control-label">Cliente: </label>
    <div class="col-sm-8">
        <?php echo $nombre_cliente;?>
    </div>
</div>
<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
        <?php echo $patente_vehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-4 control-label">Descripción: </label>
    <div class="col-sm-8">
       <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas" class="col-sm-4 control-label">Trasladistas: </label>
    <div class="col-sm-8">
       <?php echo $trasladistas;?>
    </div>
</div>
<div class="form-group">
    <label for="gasolina" class="col-sm-4 control-label">Costo gasolina: </label>
    <div class="col-sm-8">
       <?php echo $gasolina;?>
    </div>
</div>
<div class="form-group">
    <label for="otros" class="col-sm-4 control-label">Otros: </label>
    <div class="col-sm-8">
       <?php echo $otros;?>
    </div>
</div>
<div class="form-group">
    <label for="vendedor" class="col-sm-4 control-label">Vendedor: </label>
    <div class="col-sm-8">
       <?php echo $vendedor;?>
    </div>
</div>
<div class="form-group">
    <label for="fecha_carga" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $fecha_carga;?>
    </div>
</div>