<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from verificacion where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $id=$rw['id'];

            $fecha_veri=$rw['fecha_veri'];

                $idcliente=$rw['idcliente'];
                $clientes=mysqli_query($con, "select * from cliente where id=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $patente_vehiculo=$vehiculo_rw['marca'];

                $idcarro=$rw['idcarro'];
                $carros=mysqli_query($con, "select * from cliente where id=$idcarro");
                $carro_rw=mysqli_fetch_array($carros);
                $clave_carro=$carro_rw['placa'];

            $derechos_admin=$rw['derechos_admin'];
            $otros_admin=$rw['otros_admin'];
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
    <label for="idfecha_veri" class="col-sm-4 control-label">Fecha Registro: </label>
    <div class="col-sm-8">
        <?php echo $fecha_veri;?>
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
    <label for="idcarro" class="col-sm-4 control-label">Placa: </label>
    <div class="col-sm-8">
       <?php echo $clave_carro;?>
    </div>
</div>
<div class="form-group">
    <label for="derechos_admin" class="col-sm-2 control-label">Derechos: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="derechos_admin" name="derechos_admin" placeholder="Derechos "><?php echo $derechos_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="otros_admin" class="col-sm-2 control-label">Otros: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="otros_admin" name="otros_admin" placeholder="Otros "><?php echo $otros_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas_admin" class="col-sm-2 control-label">trasladistas: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="trasladistas_admin" name="trasladistas_admin" placeholder="trasladistas "><?php echo $trasladistas_admin ?></textarea>
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

