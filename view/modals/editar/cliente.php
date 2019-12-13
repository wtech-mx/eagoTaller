<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from cliente where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $nombre=$rw['nombre'];
            $apellido=$rw['apellido'];
            $telefono=$rw['telefono'];
            $correo=$rw['correo'];
            $edad=$rw['edad'];
            $manejo=$rw['manejo'];
            $colTrabajo=$rw['colTrabajo'];
            $colCasa=$rw['colCasa'];
            $cpTrabajo=$rw['cpTrabajo'];
            $cpCasa=$rw['cpCasa'];
            $km=$rw['km'];
            $entidad=$rw['entidad'];
            $tipo=$rw['tipo'];
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
    <label for="telefono" class="col-sm-2 control-label">Telefono: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>" placeholder="Telefono ">
    </div>
</div>
<div class="form-group">
    <label for="correo" class="col-sm-2 control-label">Correo Electrónico: </label>
    <div class="col-sm-10">
        <input type="correo" required class="form-control" id="correo" name="correo" value="<?php echo $correo;?>" placeholder="Correo Electrónico: ">
    </div>
</div>
<div class="form-group">
    <label for="edad" class="col-sm-2 control-label">Edad: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $edad;?>" placeholder="Edad ">
    </div>
</div>
<div class="form-group">
    <label for="manejo" class="col-sm-2 control-label">Manejo: </label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="manejo" name="manejo" value="<?php echo $manejo;?>" placeholder="Manejo ">
    </div>
</div>
<div class="form-group">
    <label for="colTrabajo" class="col-sm-2 control-label">Col. Trabajo</label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="colTrabajo" name="colTrabajo" value="<?php echo $colTrabajo;?>" placeholder="Col. Trabajo">
    </div>
</div>
<div class="form-group">
    <label for="cpTrabajo" class="col-sm-2 control-label">CP. Trabajo: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="cpTrabajo" name="cpTrabajo" value="<?php echo $cpTrabajo;?>" placeholder="CP. Trabajo ">
    </div>
</div>
<div class="form-group">
    <label for="colCasa" class="col-sm-2 control-label">Col. Casa: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="colCasa" name="colCasa" value="<?php echo $colCasa;?>" placeholder="Col. Casa ">
    </div>
</div>
<div class="form-group">
    <label for="cpCasa" class="col-sm-2 control-label">CP. Casa: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="cpCasa" name="cpCasa" value="<?php echo $cpCasa;?>" placeholder="CP. Casa ">
    </div>
</div>
<div class="form-group">
    <label for="entidad" class="col-sm-2 control-label">Entidad: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="entidad" name="entidad" value="<?php echo $entidad;?>" placeholder="Entidad ">
    </div>
</div>
<div class="form-group">
    <label for="tipo" class="col-sm-2 control-label">Tipo: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipo;?>" placeholder="Tipo ">
    </div>
</div>