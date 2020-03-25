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
            $id=$rw['id'];

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
    <label for="trasladista_admin" class="col-sm-2 control-label">Trasladista: </label>
    <div class="col-sm-10">
        <p> <?php echo $nombre_trasladista;?></p>
        <div class="input-group">
          <div class="input-group-addon">$</div>
          <input type="number" class="form-control" id="trasladista_admin" name="trasladista_admin" placeholder="costo-Trasladista" value="<?php echo $trasladista_admin ?>" onchange="SumarAutomatico(this.value);">
          <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gasolina" class="col-sm-2 control-label">Gasolina: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
             <input type="number" class="form-control" id="gasolina" name="gasolina" placeholder="costo-Gasolina" value="<?php echo $gasolina ?>" onchange="SumarAutomatico(this.value);">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="otro_admin" class="col-sm-2 control-label">otro: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
             <input type="number" class="form-control" id="otro_admin" name="otro_admin" placeholder="costo-admin" value="<?php echo $otro_admin ?>" onchange="SumarAutomatico(this.value);">
             <div class="input-group-addon">.00</div>
         </div>
    </div>
</div>



<div class="form-group">
    <label for="subtotal" class="col-sm-2 control-label">Subtotal: </label>
    <div class="col-sm-10">
      <div class="input-group">
           <div class="input-group-addon">$</div>
           <textarea class="form-control" id="subtotal" name="subtotal" onchange="SumarAuto(this.value);"><?php echo $subtotal ?></textarea>
           <!-- <input type="number" class="form-control" id="subtotal" name="subtotal" onchange="SumarAuto(this.value);" value="</?php echo $subtotal;?>">-->
           <div class="input-group-addon">.00</div>
       </div>
    </div>
</div>

<div class="form-group">
    <label for="eago" class="col-sm-2 control-label">EAGO: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="number" class="form-control" id="eago" name="eago" placeholder="EAGO" value="<?php echo $eago ?>" onchange="SumarAutomatico(this.value);">
            <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="total" class="col-sm-2 control-label">Total: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <textarea class="form-control" id="total" name="total"></textarea>
            <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado: </label>
        <div class="col-sm-4">
            <select class="form-control" name="estado" id="estado">
                <option class="selected" value="1" <?php if ($status==1){echo "selected";}?>>Adeudo</option>
                <option value="2" <?php if ($status==2){echo "selected";}?>>Pagado</option>
            </select>
        </div>
</div>

<script type="text/javascript">
/* Funcion suma. */
function SumarAutomatico (valor) {
    var TotalSuma = 0;  
    valor = parseInt(valor); // Convertir a numero entero (número).
    TotalSuma = document.getElementById('subtotal').innerHTML;
    // Valida y pone en cero "0".
    TotalSuma = (TotalSuma == null || TotalSuma == undefined || TotalSuma == "") ? 0 : TotalSuma;
    /* Variable genrando la suma. */
    TotalSuma = (parseInt(TotalSuma) + parseInt(valor));
    // Escribir el resultado en una etiqueta "span".
    document.getElementById('subtotal').innerHTML = TotalSuma;
}
</script>

<script type="text/javascript">
/* Funcion suma. */
function SumarAuto (valor) {
    var TotalSuma = 0;  
    valor = parseInt(valor); // Convertir a numero entero (número).
    TotalSuma = document.getElementById('total').innerHTML;
    // Valida y pone en cero "0".
    TotalSuma = (TotalSuma == null || TotalSuma == undefined || TotalSuma == "") ? 0 : TotalSuma;
    /* Variable genrando la suma. */
    TotalSuma = (parseInt(TotalSuma) + parseInt(valor));
    // Escribir el resultado en una etiqueta "span".
    document.getElementById('total').innerHTML = TotalSuma;
}
</script>