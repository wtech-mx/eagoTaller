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
    <label for="nombre" class="col-sm-4 control-label">Nombre: </label>
    <div class="col-sm-8">
        <?php echo $nombre;?>
    </div>
</div>
<div class="form-group">
    <label for="apellido" class="col-sm-4 control-label">Apellido: </label>
    <div class="col-sm-8">
        <?php echo $apellido;?>
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="col-sm-4 control-label">Telefóno</label>
    <div class="col-sm-8">
        <?php echo $telefono;?>
    </div>
</div>
<div class="form-group">
    <label for="correo" class="col-sm-4 control-label">Correo Electrónico: </label>
    <div class="col-sm-8">
       <?php echo $correo;?>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-sm-4 control-label">Estado: </label>
    <div class="col-sm-8">
        <?php echo ($status==1)?  "Activo" :  "Inactivo";?>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $created_at;?>
    </div>
</div>