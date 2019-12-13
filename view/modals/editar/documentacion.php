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
    <label for="documento" class="col-sm-2 control-label">Documento: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="documento" name="documento" value="<?php echo $documento;?>" placeholder="Documento ">
    </div>
</div>
<div class="form-group">
    <label for="facturaO" class="col-sm-2 control-label">Factura Origen: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="facturaO" name="facturaO" value="<?php echo $facturaO;?>" placeholder="Factura Origen ">
    </div>
</div>
<div class="form-group">
    <label for="factura1" class="col-sm-2 control-label">Refactura 1: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="factura1" name="factura1" value="<?php echo $factura1;?>" placeholder="Refactura 1 ">
    </div>
</div>
<div class="form-group">
    <label for="factura2" class="col-sm-2 control-label">Refactura 2</label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="factura2" name="factura2" value="<?php echo $factura2;?>" placeholder="Refactura 2">
    </div>
</div>
<div class="form-group">
    <label for="factura3" class="col-sm-2 control-label">Refactura 3: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="factura3" name="factura3" value="<?php echo $factura3;?>" placeholder="Refactura 3">
    </div>
</div>
<div class="form-group">
    <label for="tenencia" class="col-sm-2 control-label">Tenencia o Refrendos: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="tenencia" name="tenencia" value="<?php echo $tenencia;?>" placeholder="Tenencia o Refrendos">
    </div>
</div>