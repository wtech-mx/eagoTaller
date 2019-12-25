<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from traslados where id='$id'";
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
            $gasolina=$rw['gasolina'];
            $casetas=$rw['casetas'];
            $trasladistas=$rw['trasladistas'];
            $vendedor=$rw['vendedor'];
            $destino=$rw['destino'];
            $origen=$rw['origen'];
            $fecha_tras=$rw['fecha_tras'];
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
    <label for="datos" class="col-sm-4 control-label">Datos...: </label>
    <div class="col-sm-8">
       <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="gasolina" class="col-sm-4 control-label">Costo gasolina: </label>
    <div class="col-sm-8">
       <?php echo $gasolina;?>
    </div>
</div>
<div class="form-group">
    <label for="casetas" class="col-sm-4 control-label">Casetas: </label>
    <div class="col-sm-8">
       <?php echo $casetas;?>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas" class="col-sm-4 control-label">Trasladistas: </label>
    <div class="col-sm-8">
       <?php echo $trasladistas;?>
    </div>
</div>
<div class="form-group">
    <label for="vendedor" class="col-sm-4 control-label">Vendedor: </label>
    <div class="col-sm-8">
       <?php echo $vendedor;?>
    </div>
</div>
<div class="form-group">
    <label for="destino" class="col-sm-4 control-label">Destino: </label>
    <div class="col-sm-8">
       <?php echo $destino;?>
    </div>
</div>
<div class="form-group">
    <label for="origen" class="col-sm-4 control-label">Origen: </label>
    <div class="col-sm-8">
       <?php echo $origen;?>
    </div>
</div>
<div class="form-group">
    <label for="fecha_tras" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $fecha_tras;?>
    </div>
</div>