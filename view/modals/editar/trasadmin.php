<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from traslados where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $id=$rw['id'];

            $fecha_tras=$rw['fecha_tras'];

                $idcliente=$rw['idcliente'];
                $clientes=mysqli_query($con, "select * from cliente where id=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $patente_vehiculo=$vehiculo_rw['marca'];

                $datos=$rw['datos'];
            $autobus=$rw['autobus'];
            $gasolina_admin=$rw['gasolina_admin'];
            $casetas_admin=$rw['casetas_admin'];
            $trasladistas_admin=$rw['trasladistas_admin'];
            $vendedor_admin=$rw['vendedor_admin'];
            $subtotal_admin=$rw['subtotal_admin'];
            $eago_admin=$rw['eago_admin'];
            $total_admin=$rw['total_admin'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="idfecha_tras" class="col-sm-4 control-label">Fecha Registro: </label>
    <div class="col-sm-8">
        <?php echo $fecha_tras;?>
    </div>
</div>
<div class="form-group">
<label for="idcliente" class="col-sm-4 control-label">Cliente: </label>
    <div class="col-sm-8">
        <?php echo $nombre_cliente;?>
    </div>
</div>
<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
        <?php echo $patente_vehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-4 control-label">Datos: </label>
    <div class="col-sm-8">
        <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="autobus" class="col-sm-2 control-label">Autobus: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="autobus" name="autobus" placeholder="Autobus "><?php echo $autobus ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="gasolina_admin" class="col-sm-2 control-label">Costo gasolina: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="gasolina_admin" name="gasolina_admin" placeholder="Gasolina $"><?php echo $gasolina_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="casetas_admin" class="col-sm-2 control-label">Casetas: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="casetas_admin" name="casetas_admin" placeholder="Casetas "><?php echo $casetas_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas_admin" class="col-sm-2 control-label">Trasladistas: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="trasladistas_admin" name="trasladistas_admin" placeholder="Trasladistas"><?php echo $trasladistas_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="vendedor_admin" class="col-sm-2 control-label">Vendedor: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="vendedor_admin" name="vendedor_admin" placeholder="Vendedor "><?php echo $vendedor_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="subtotal_admin" class="col-sm-2 control-label">Subtotal: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="subtotal_admin" name="subtotal_admin" placeholder="Subtotal "><?php echo $subtotal_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="eago_admin" class="col-sm-2 control-label">EAGO: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="eago_admin" name="eago_admin" placeholder="EAGO "><?php echo $eago_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="total_admin" class="col-sm-2 control-label">Total: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="total_admin" name="total_admin" placeholder="Total "><?php echo $total_admin ?></textarea>
    </div>
</div>

