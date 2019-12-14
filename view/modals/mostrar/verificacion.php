<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from verificacion where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $idcliente=$rw['idcliente'];
            $idvehiculo=$rw['idvehiculo'];
            $datos=$rw['datos'];
            $fecha_carga=$rw['fecha_carga'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="idcliente" class="col-sm-4 control-label">Cliente: </label>
    <div class="col-sm-8">
        <?php echo $idcliente;?>
    </div>
</div>
<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
        <?php echo $idvehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-4 control-label">Datos...: </label>
    <div class="col-sm-8">
       <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="fecha_carga" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $fecha_carga;?>
    </div>
</div>