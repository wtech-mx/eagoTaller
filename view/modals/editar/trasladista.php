<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from trasladista where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $nombre=$rw['nombre'];
            $apellido=$rw['apellido'];
            $telefono=$rw['telefono'];
            $correo=$rw['correo'];
            $status=$rw['status'];
            $created_at=$rw['created_at'];
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
<label for="estado" class="col-sm-2 control-label">Estado: </label>
<div class="col-sm-4">
    <select class="form-control" name="estado" id="estado">
        <option value="1" <?php if ($status==1){echo "selected";}?>>Activo</option>
        <option value="2" <?php if ($status==2){echo "selected";}?>>Inactivo</option>
    </select>
</div>
</div>