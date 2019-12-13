<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from gestoria where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $nombre=$rw['nombre'];
            $apellido=$rw['apellido'];
            $vehiculo=$rw['vehiculo'];
            $datos=$rw['datos'];
            $fecha=$rw['fecha'];
            $aplaca=$rw['aplaca'];
            $bplaca=$rw['bplaca'];
            $rplaca=$rw['rplaca'];
            $tarjeta=$rw['tarjeta'];
            $otro=$rw['otro'];
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
<div class="form-group">
    <label for="aplaca" class="col-sm-2 control-label">Alta de placas: </label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="aplaca" name="aplaca" value="<?php echo $aplaca;?>" placeholder="Alta de placas ">
    </div>
</div>
<div class="form-group">
    <label for="bplaca" class="col-sm-2 control-label">Baja de placas</label>
    <div class="col-sm-10">
        <input type="date" required class="form-control" id="bplaca" name="bplaca" value="<?php echo $bplaca;?>" placeholder="Baja de placas">
    </div>
</div>
<div class="form-group">
    <label for="rplaca" class="col-sm-2 control-label">Reposición de placas: </label>
    <div class="col-sm-10">
        <input type="date" required class="form-control" id="rplaca" name="rplaca" value="<?php echo $rplaca;?>" placeholder="Reposición de placas ">
    </div>
</div>
<div class="form-group">
    <label for="tarjeta" class="col-sm-2 control-label">Reposición de tarjeta: </label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta;?>" placeholder="Reposición de tarjeta ">
    </div>
</div>
<div class="form-group">
    <label for="otro" class="col-sm-2 control-label">Otro: </label>
    <div class="col-sm-10">
        <input type="otro" required class="form-control" id="otro" name="otro" value="<?php echo $otro;?>" placeholder="Otro ">
    </div>
</div>