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

                $fecha_ges=$rw['fecha_ges'];

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

                $aplaca=$rw['aplaca'];
;
                $gastos=$rw['gastos'];
                $mensajeria=$rw['mensajeria'];
                $vendedor=$rw['vendedor'];
                $general=$rw['general'];
                $subtotal_admin=$rw['subtotal_admin'];
                $eago_admin=$rw['eago_admin'];
                $total_admin=$rw['total_admin'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="fecha_ges" class="col-sm-4 control-label">Fecha Registro: </label>
    <div class="col-sm-8">
        <?php echo $fecha_ges;?>
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
    <label for="aplaca" class="col-sm-4 control-label">Alta de placas: </label>
    <div class="col-sm-8">
       <?php echo $aplaca;?>
    </div>
</div>
<div class="form-group">
    <label for="gastos" class="col-sm-4 control-label">Gastos: </label>
    <div class="col-sm-8">
       <?php echo $gastos;?>
    </div>
</div>
<div class="form-group">
    <label for="mensajeria" class="col-sm-4 control-label">Mensajeria: </label>
    <div class="col-sm-8">
       <?php echo $mensajeria;?>
    </div>
</div>
<div class="form-group">
    <label for="vendedor" class="col-sm-4 control-label">vendedor: </label>
    <div class="col-sm-8">
       <?php echo $vendedor;?>
    </div>
</div>
<div class="form-group">
    <label for="general" class="col-sm-4 control-label">General: </label>
    <div class="col-sm-8">
       <?php echo $general;?>
    </div>
</div>
<div class="form-group">
    <label for="subtotal_admin" class="col-sm-4 control-label">Subtotal: </label>
    <div class="col-sm-8">
       <?php echo $subtotal_admin;?>
    </div>
</div>
<div class="form-group">
    <label for="eago_admin" class="col-sm-4 control-label">EAGO: </label>
    <div class="col-sm-8">
       <?php echo $eago_admin;?>
    </div>
</div>
<div class="form-group">
    <label for="total_admin" class="col-sm-4 control-label">Total: </label>
    <div class="col-sm-8">
       <?php echo $total_admin;?>
    </div>
</div>