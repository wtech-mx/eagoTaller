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
            $foto1=$rw['foto1'];
            $foto2=$rw['foto2'];
            $foto3=$rw['foto3'];
            $foto4=$rw['foto4'];
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
    <label for="edad" class="col-sm-4 control-label">Edad: </label>
    <div class="col-sm-8">
        <?php echo $edad;?>
    </div>
</div>
<div class="form-group">
    <label for="manejo" class="col-sm-4 control-label">Licencia de Manejo: </label>
    <div class="col-sm-8">
        <?php echo $manejo;?>
    </div>
</div>
<!-- <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Contraseña: </label>
    <div class="col-sm-8">
        <input type="password" class="form-control" id="password" name="password" placeholder="*******">
        <p class="text-right text-muted">La contraseña solo se modifica si escribes algo!.</p>
    </div>
</div> -->
<div class="form-group">
    <label for="colTrabajo" class="col-sm-4 control-label">Col. Trabajo: </label>
    <div class="col-sm-8">
        <?php echo $colTrabajo;?>
    </div>
</div>
<div class="form-group">
    <label for="cpTrabajo" class="col-sm-4 control-label">CP. Trabajo: </label>
    <div class="col-sm-8">
        <?php echo $cpTrabajo;?>
    </div>
</div>
<div class="form-group">
    <label for="colCasa" class="col-sm-4 control-label">Col. Casa: </label>
    <div class="col-sm-8">
        <?php echo $colCasa;?>
    </div>
</div>
<div class="form-group">
    <label for="cpCasa" class="col-sm-4 control-label">CP. Casa: </label>
    <div class="col-sm-8">
       <?php echo $cpCasa;?>
    </div>
</div>
<div class="form-group">
    <label for="entidad" class="col-sm-4 control-label">Entidad: </label>
    <div class="col-sm-8">
        <?php echo $entidad;?>
    </div>
</div>
<div class="form-group">
    <label for="tipo" class="col-sm-4 control-label">Tipo: </label>
    <div class="col-sm-8">
        <?php echo $tipo;?>
    </div>
</div>
<div class="form-group">
    <label for="km" class="col-sm-4 control-label">Km por semana: </label>
    <div class="col-sm-8">
        <?php echo $km;?>
    </div>
</div>
<div class="form-group">
    <label for="foto1" class="col-sm-4 control-label">foto1: </label>
    <div class="col-sm-8">
        <?php echo $foto1;?>
    </div>
</div>
<div class="form-group">
    <label for="foto2" class="col-sm-4 control-label">foto2: </label>
    <div class="col-sm-8">
        <?php echo $foto2;?>
    </div>
</div>
<div class="form-group">
    <label for="foto3" class="col-sm-4 control-label">foto3: </label>
    <div class="col-sm-8">
        <?php echo $foto3;?>
    </div>
</div>
<div class="form-group">
    <label for="foto4" class="col-sm-4 control-label">foto4: </label>
    <div class="col-sm-8">
        <?php echo $foto4;?>
    </div>
</div>
