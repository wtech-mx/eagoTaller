<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from mantenimiento where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){

            $rw=mysqli_fetch_array($query);
             $fecha_man=$rw['fecha_man'];

                $idcliente=$rw['id_cliente'];
                $clientes=mysqli_query($con, "select * from cliente where id_cliente=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $patente_vehiculo=$vehiculo_rw['patente'];

                $idtrasladista=$rw['idtrasladista'];
                $trasladistas=mysqli_query($con, "select * from trasladista where id=$idtrasladista");
                $trasladista_rw=mysqli_fetch_array($trasladistas);
                $nombre_trasladista=$trasladista_rw['nombre']." ".$trasladista_rw['apellido'];

            $otro_admin=$rw['otro_admin'];
            $trasladista_admin=$rw['trasladista_admin'];
            $gasolina=$rw['gasolina'];
            $subtotal=$rw['subtotal'];
            $eago=$rw['eago'];
            $total=$rw['total'];
            $status=$rw['estado'];

                if ($status==1){
                    $lbl_status="Adeudo";
                    $lbl_class='label label-danger';
                }else {
                    $lbl_status="Pagado";
                    $lbl_class='label label-success';
                    
                }
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">

<div class="form-group">
    <label for="fecha_man" class="col-sm-4 control-label">Fecha Registro: </label>
    <div class="col-sm-8">
        <p><?php echo $fecha_man;?></p>
    </div>
</div>

<div class="form-group">
    <label for="id_cliente" class="col-sm-4 control-label">Cliente: </label>
    <div class="col-sm-8">
        <p><?php echo $nombre_cliente;?></p>
    </div>
</div>

<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
       <p><?php echo $patente_vehiculo;?></p>
    </div>
</div>

<div class="form-group">
    <label for="gasolina" class="col-sm-4 control-label">Costo gasolina: </label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control"  value="<?php echo $gasolina;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">Otros: </label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $otro_admin;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="trasladista_admin" class="col-sm-4 control-label">Trasladista: </label>
    <div class="col-sm-8">
         <?php echo $nombre_trasladista;?>
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $trasladista_admin;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="eago" class="col-sm-4 control-label">Subtotal:</label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $subtotal;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="subtotal" class="col-sm-4 control-label">EAGO:</label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $eago;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="total" class="col-sm-4 control-label">Total:</label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $total;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="estado" class="col-sm-4 control-label">Estado: </label>
    <div class="col-sm-8">
        <p><?php echo $lbl_status;?></p>
    </div>
</div>