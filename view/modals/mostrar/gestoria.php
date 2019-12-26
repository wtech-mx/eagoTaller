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
                $placa_carro=$carro_rw['placa'];

                $datos=$rw['datos'];
                $trasladistas=$rw['trasladistas'];
                $gasolina=$rw['gasolina'];
                $otro=$rw['otro'];
                $aplaca=$rw['aplaca'];
                $bplaca=$rw['bplaca'];
                $rplaca=$rw['rplaca'];
                $tarjeta=$rw['tarjeta'];
                $fecha_carga=$rw['fecha_carga'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
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
    <label for="datos" class="col-sm-4 control-label">Descripción: </label>
    <div class="col-sm-8">
       <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="carro" class="col-sm-4 control-label">Placa: </label>
    <div class="col-sm-8">
       <?php echo $placa_carro;?>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas" class="col-sm-4 control-label">Trasladistas: </label>
    <div class="col-sm-8">
       <?php echo $trasladistas;?>
    </div>
</div>
<div class="form-group">
    <label for="gasolina" class="col-sm-4 control-label">Costo gasolina: </label>
    <div class="col-sm-8">
       <?php echo $gasolina;?>
    </div>
</div>
<div class="form-group">
    <label for="otro" class="col-sm-4 control-label">Otros: </label>
    <div class="col-sm-8">
       <?php echo $otro;?>
    </div>
</div>
<div class="form-group">
    <label for="aplaca" class="col-sm-4 control-label">Aplaca placa: </label>
    <div class="col-sm-8">
       <?php echo $aplaca;?>
    </div>
</div>
<div class="form-group">
    <label for="bplaca" class="col-sm-4 control-label">Baja placa: </label>
    <div class="col-sm-8">
       <?php echo $bplaca;?>
    </div>
</div>
<div class="form-group">
    <label for="rplaca" class="col-sm-4 control-label">Reposición placa: </label>
    <div class="col-sm-8">
       <?php echo $rplaca;?>
    </div>
</div>
<div class="form-group">
    <label for="tarjeta" class="col-sm-4 control-label">Reposición tarjeta: </label>
    <div class="col-sm-8">
       <?php echo $tarjeta;?>
    </div>
</div>
<div class="form-group">
    <label for="fecha_carga" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $fecha_carga;?>
    </div>
</div>