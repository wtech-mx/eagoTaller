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
            $nombre=$rw['nombre'];
            $apellido=$rw['apellido'];
            $vehiculo=$rw['vehiculo'];
            $datos=$rw['datos'];
            $fecha=$rw['fecha'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" placeholder="Nombre: ">
    </div>
</div>
<div class="form-group">
    <label for="apellido" class="col-sm-2 control-label">Apellido: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="apellido" name="apellido" value="<?php echo $apellido;?>" placeholder="Apellido: ">
    </div>
</div>
<div class="form-group">
    <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="vehiculo" name="vehiculo" value="<?php echo $vehiculo;?>" placeholder="Vehiculo ">
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-2 control-label">Datos...: </label>
    <div class="col-sm-10">
        <input type="datos" required class="form-control" id="datos" name="datos" value="<?php echo $datos;?>" placeholder="Datos... ">
    </div>
</div>
<div class="form-group">
    <label for="fecha" class="col-sm-2 control-label">fecha de registro: </label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha;?>" placeholder="fecha de registro ">
    </div>
</div>