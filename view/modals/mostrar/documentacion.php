<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from documentacion where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$nombre=$rw['nombre'];
			$apellido=$rw['apellido'];
			$vehiculo=$rw['vehiculo'];
			$documento=$rw['documento'];
			$facturaO=$rw['facturaO'];
			$factura1=$rw['factura1'];
			$factura2=$rw['factura2'];
			$factura3=$rw['factura3'];
			$tenencia=$rw['tenencia'];
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
    <label for="documento" class="col-sm-4 control-label">Documento: </label>
    <div class="col-sm-8">
       <?php echo $documento;?>
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
    <label for="facturaO" class="col-sm-4 control-label">Factura Origen: </label>
    <div class="col-sm-8">
        <?php echo $facturaO;?>
    </div>
</div>
<div class="form-group">
    <label for="factura1" class="col-sm-4 control-label">Refactura 1: </label>
    <div class="col-sm-8">
        <?php echo $factura1;?>
    </div>
</div>
<div class="form-group">
    <label for="factura2" class="col-sm-4 control-label">Refactura 2: </label>
    <div class="col-sm-8">
        <?php echo $factura2;?>
    </div>
</div>
<div class="form-group">
    <label for="factura3" class="col-sm-4 control-label">Refactura 3: </label>
    <div class="col-sm-8">
        <?php echo $factura3;?>
    </div>
</div>
<div class="form-group">
    <label for="tenencia" class="col-sm-4 control-label">Tenencia: </label>
    <div class="col-sm-8">
       <?php echo $tenencia;?>
    </div>
</div>