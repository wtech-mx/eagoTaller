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

                $idcliente=$rw['id_cliente'];
                $clientes=mysqli_query($con, "select * from cliente where id_cliente=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

                $idempresa=$rw['id_empresa'];
                $empresas=mysqli_query($con, "select * from empresa where id_empresa=$idempresa");
                $empresa_rw=mysqli_fetch_array($empresas);
                $nombre_empresa=$empresa_rw['nombre'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $patente_vehiculo=$vehiculo_rw['patente'];

                $idtrasladista=$rw['idtrasladista'];
                $trasladistas=mysqli_query($con, "select * from trasladista where id=$idtrasladista");
                $trasladista_rw=mysqli_fetch_array($trasladistas);
                $nombre_trasladista=$trasladista_rw['nombre']." ".$trasladista_rw['apellido'];

                $idtaller=$rw['idtaller'];
                $tallers=mysqli_query($con, "select * from taller where id=$idtaller");
                $taller_rw=mysqli_fetch_array($tallers);
                $nombre_taller=$taller_rw['nombre'];

            $datos=$rw['datos'];
            $vendedor=$rw['vendedor'];
            $destino=$rw['destino'];
            $origen=$rw['origen'];
            $fecha_tras=$rw['fecha_tras'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="id_cliente" class="col-sm-4 control-label">Cliente: </label>
    <div class="col-sm-8">
        <?php echo $nombre_cliente;?>
    </div>
</div>
<div class="form-group">
    <label for="id_empresa" class="col-sm-4 control-label">Empresa: </label>
    <div class="col-sm-8">
        <?php echo $nombre_empresa;?>
    </div>
</div>
<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
        <?php echo $patente_vehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-4 control-label">Datos...: </label>
    <div class="col-sm-8">
       <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="taller" class="col-sm-4 control-label">Taller: </label>
    <div class="col-sm-8">
       <?php echo $nombre_taller;?>
    </div>
</div>
<div class="form-group">
    <label for="trasladista" class="col-sm-4 control-label">Trasladista: </label>
    <div class="col-sm-8">
       <?php echo $nombre_trasladista;?>
    </div>
</div>
<div class="form-group">
    <label for="vendedor" class="col-sm-4 control-label">Vendedor: </label>
    <div class="col-sm-8">
       <?php echo $vendedor;?>
    </div>
</div>
<div class="form-group">
    <label for="origen" class="col-sm-4 control-label">Recoger en: </label>
    <div class="col-sm-8">
       <?php echo $origen;?>
    </div>
</div>
<div class="form-group">
    <label for="destino" class="col-sm-4 control-label">Destino: </label>
    <div class="col-sm-8">
       <?php echo $destino;?>
    </div>
</div>
<div class="form-group">
    <label for="fecha_tras" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $fecha_tras;?>
    </div>
</div>