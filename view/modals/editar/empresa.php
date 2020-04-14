<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id_empresa"])){
		$id=$_GET["id_empresa"];
		$id=intval($id);
		$sql="select * from empresa where id_empresa='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
            $nombre=$rw['nombre'];
            $correo=$rw['correo'];
            $telefono=$rw['telefono'];
            $status=$rw['estado'];
            $created_at=$rw['fecha_carga'];
		}
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id_empresa" id="id_empresa">
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" placeholder="Nombre: ">
    </div>
</div>
<div class="form-group">
    <label for="correo" class="col-sm-2 control-label">Correo: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="correo" name="correo" value="<?php echo $correo;?>" placeholder="Correo ">
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="col-sm-2 control-label">Telefono: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>" placeholder="Telefono ">
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado: </label>
    <div class="col-sm-10">
        <select class="form-control" name="estado" id="estado">
			<option value="1" <?php if ($status==1){echo "selected";}?>>Activo</option>
			<option value="2" <?php if ($status==2){echo "selected";}?>>Inactivo</option>
		</select>
    </div>
</div>
