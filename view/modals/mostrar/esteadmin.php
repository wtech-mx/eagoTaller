<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from estetica where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);

                $fecha_rep=$rw['fecha_rep'];

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

            $vendedor=$rw['vendedor'];
            $datos=$rw['datos'];
            $reparacion=$rw['reparacion'];
            $trasladistas_admin=$rw['trasladistas_admin'];
            $gasolina_admin=$rw['gasolina_admin'];
            $otros_admin=$rw['otros_admin'];
            $status=$rw['estado'];

                if ($status==1){
                    $lbl_status="Adeudo";
                    $lbl_class='label label-danger';
                }else {
                    $lbl_status="Pagado";
                    $lbl_class='label label-success';
                    
                }
            $asesor=$rw['asesor'];
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
    <label for="fecha_rep" class="col-sm-4 control-label">Fecha Registro: </label>
    <div class="col-sm-8">
        <p><?php echo $fecha_rep;?></p>
    </div>
</div>

<div class="form-group">
    <label for="estado" class="col-sm-4 control-label">Estado: </label>
    <div class="col-sm-8">
       <p> <?php echo $lbl_status;?></p>
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
    <label for="datos" class="col-sm-4 control-label">Descripción: </label>
    <div class="col-sm-8">
        <p><?php echo $datos;?></p>
    </div>
</div>


<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">Costo de reparacion: </label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control"  value="<?php echo $reparacion;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">costo de Vendedor: </label>
    <div class="col-sm-8">
         <?php echo $nombre_trasladista;?>
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $trasladistas_admin;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">Costo gasolina: </label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control"  value="<?php echo $gasolina_admin ?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">Otros: </label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $otros_admin ?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">costo de Asesor: </label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $asesor;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">costo de Vendedor: </label>
    <div class="col-sm-8">
         <?php echo $vendedor;?> 
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $vendedor_admin;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">Subtotal:</label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $subtotal_admin;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">EAGO:</label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $eago_admin;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina_admin" class="col-sm-4 control-label">Total:</label>
    <div class="col-sm-8">
        <div class="input-group col-sm-6">
            <div class="input-group-addon">$</div>
             <input disabled type="number" class="form-control" value="<?php echo $total_admin;?>">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

