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
			$aplaca=$rw['aplaca'];
			$bplaca=$rw['bplaca'];
			$rplaca=$rw['rplaca'];
			$tarjeta=$rw['tarjeta'];
			$otro=$rw['otro'];
			$fecha=$rw['fecha'];
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
    <label for="vehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
        <?php echo $vehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-4 control-label">Datos...: </label>
    <div class="col-sm-8">
       <?php echo $datos;?>
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
    <label for="aplaca" class="col-sm-4 control-label">Alta de placas: </label>
    <div class="col-sm-8">
        <?php echo $aplaca;?>
    </div>
</div>
<div class="form-group">
    <label for="bplaca" class="col-sm-4 control-label">Baja de placas: </label>
    <div class="col-sm-8">
        <?php echo $bplaca;?>
    </div>
</div>
<div class="form-group">
    <label for="rplaca" class="col-sm-4 control-label">Reposición de placas</label>
    <div class="col-sm-8">
        <?php echo $rplaca;?>
    </div>
</div>
<div class="form-group">
    <label for="tarjeta" class="col-sm-4 control-label">Reposición de tarjetas: </label>
    <div class="col-sm-8">
        <?php echo $tarjeta;?>
    </div>
</div>
<div class="form-group">
    <label for="otro" class="col-sm-4 control-label">Otro: </label>
    <div class="col-sm-8">
       <?php echo $otro;?>
    </div>
</div>
<div class="form-group">
    <label for="fecha" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $fecha;?>
    </div>
</div>