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
            $id=$rw['id'];

            $fecha_rep=$rw['fecha_rep'];

                $idcliente=$rw['idcliente'];
                $clientes=mysqli_query($con, "select * from cliente where id=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $patente_vehiculo=$vehiculo_rw['patente'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $marca_vehiculo=$vehiculo_rw['marca'];


            $trasladistas=$rw['trasladistas'];
            $vendedor=$rw['vendedor'];
            $datos=$rw['datos'];
            $reparacion=$rw['reparacion'];
            $trasladistas_admin=$rw['trasladistas_admin'];
            $gasolina_admin=$rw['gasolina_admin'];
            $otros_admin=$rw['otros_admin'];
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
    <label for="idfecha_rep" class="col-sm-4 control-label">Fecha Registro: </label>
    <div class="col-sm-8">
        <?php echo $fecha_rep;?>
    </div>
</div>
<div class="form-group">
<label for="idcliente" class="col-sm-4 control-label">Cliente: </label>
    <div class="col-sm-8">
        <?php echo $nombre_cliente;?>
    </div>
</div>
<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Placa: </label>
    <div class="col-sm-8">
        <?php echo $patente_vehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
        <?php echo $marca_vehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-4 control-label">Descripción: </label>
    <div class="col-sm-8">
        <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="reparacion" class="col-sm-2 control-label">Reparación: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="reparacion" name="reparacion" placeholder="$$$" onchange="SumarAutomatico(this.value);"><?php echo $reparacion ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas_admin" class="col-sm-2 control-label">Trasladistas: </label>
    <div class="col-sm-10">
        <?php echo $trasladistas;?>
        <textarea type="number" class="form-control" id="trasladistas_admin" name="trasladistas_admin" placeholder="$$$" onchange="SumarAutomatico(this.value);" ><?php echo $trasladistas_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="gasolina_admin" class="col-sm-2 control-label">Gasolina: </label>
    <div class="col-sm-10">
        <textarea type="number" class="form-control" id="gasolina_admin" name="gasolina_admin" placeholder="$$$" onchange="SumarAutomatico(this.value);" ><?php echo $gasolina_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="otros_admin" class="col-sm-2 control-label">otro: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="otros_admin" name="otros_admin" placeholder="otro "><?php echo $otros_admin ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="asesor" class="col-sm-2 control-label">Asesor: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="asesor" name="asesor" placeholder="Asesor "><?php echo $asesor ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="vendedor_admin" class="col-sm-2 control-label">Vendedor: </label>
    <div class="col-sm-10">
        <?php echo $vendedor;?>
        <textarea type="number" class="form-control" id="vendedor_admin" name="vendedor_admin" placeholder="$$$" onchange="SumarAutomatico(this.value);" ><?php echo $vendedor_admin ?></textarea>
</div>
</div>
<div class="form-group">
    <label for="subtotal_admin" class="col-sm-2 control-label">Subtotal: </label>
    <div class="col-sm-10">
        <textarea class="form-control" id="subtotal_admin" name="subtotal_admin" onchange="SumarAuto(this.value);"></textarea>
</div>
</div>
<div class="form-group">
    <label for="eago_admin" class="col-sm-2 control-label">EAGO: </label>
    <div class="col-sm-10">
        <textarea type="number" class="form-control" id="eago_admin" name="eago_admin" placeholder="$$$" onchange="SumarAuto(this.value);" ><?php echo $eago_admin ?></textarea>
</div>
</div>
<div class="form-group">
    <label for="total_admin" class="col-sm-2 control-label">Total: </label>
    <div class="col-sm-10">
        <textarea class="form-control" id="total_admin" name="total_admin"></textarea>
    </div>
</div>

<script type="text/javascript">
/* Funcion suma. */
function SumarAutomatico (valor) {
    var TotalSuma = 0;  
    valor = parseInt(valor); // Convertir a numero entero (número).
    TotalSuma = document.getElementById('subtotal_admin').innerHTML;
    // Valida y pone en cero "0".
    TotalSuma = (TotalSuma == null || TotalSuma == undefined || TotalSuma == "") ? 0 : TotalSuma;
    /* Variable genrando la suma. */
    TotalSuma = (parseInt(TotalSuma) + parseInt(valor));
    // Escribir el resultado en una etiqueta "span".
    document.getElementById('subtotal_admin').innerHTML = TotalSuma;
}
</script>

<script type="text/javascript">
/* Funcion suma. */
function SumarAuto (valor) {
    var TotalSuma = 0;  
    valor = parseInt(valor); // Convertir a numero entero (número).
    TotalSuma = document.getElementById('total_admin').innerHTML;
    // Valida y pone en cero "0".
    TotalSuma = (TotalSuma == null || TotalSuma == undefined || TotalSuma == "") ? 0 : TotalSuma;
    /* Variable genrando la suma. */
    TotalSuma = (parseInt(TotalSuma) + parseInt(valor));
    // Escribir el resultado en una etiqueta "span".
    document.getElementById('total_admin').innerHTML = TotalSuma;
}
</script>