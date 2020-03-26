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

            $datos=$rw['datos'];
            $derechos_admin=$rw['derechos_admin'];
            $otros_admin=$rw['otros_admin'];
            $trasladistas_admin=$rw['trasladistas_admin'];
            $vendedor=$rw['vendedor'];
            $vendedor_admin=$rw['vendedor_admin'];
            $status=$rw['estado'];
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
    <label for="idvehiculo" class="col-sm-4 control-label">Placa: </label>
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
    <label for="trasladistas_admin" class="col-sm-2 control-label">Trasladista: </label>
    <div class="col-sm-10">
        <p> <?php echo $nombre_trasladista;?></p>
        <div class="input-group">
          <div class="input-group-addon">$</div>
          <input type="number" class="form-control" id="trasladistas_admin" name="trasladistas_admin" placeholder="costo-Trasladista" value="<?php echo $trasladistas_admin ?>" onchange="SumarAutomatico(this.value);">
          <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="vendedor_admin" class="col-sm-2 control-label">Vendedor: </label>
    <div class="col-sm-10">
        <p><?php echo $vendedor;?></p>
        <div class="input-group">
            <div class="input-group-addon">$</div>
             <input type="number" class="form-control" id="vendedor_admin" name="vendedor_admin" placeholder="costo-vendedor_admin" value="<?php echo $vendedor_admin ?>" onchange="SumarAutomatico(this.value);">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="derechos_admin" class="col-sm-2 control-label">Derechos: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
             <input type="number" class="form-control" id="derechos_admin" name="derechos_admin" placeholder="costo-derechos_admin" value="<?php echo $derechos_admin ?>" onchange="SumarAutomatico(this.value);">
             <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>



<div class="form-group">
    <label for="otros_admin" class="col-sm-2 control-label">otro: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
             <input type="number" class="form-control" id="otros_admin" name="otros_admin" placeholder="costo-otros" value="<?php echo $otros_admin ?>" onchange="SumarAutomatico(this.value);">
             <div class="input-group-addon">.00</div>
         </div>
    </div>
</div>

<div class="form-group">
    <label for="subtotal_admin" class="col-sm-2 control-label">Subtotal: </label>
    <div class="col-sm-10">
      <div class="input-group">
           <div class="input-group-addon">$</div>
            <textarea class="form-control" id="subtotal_admin" name="subtotal_admin" onchange="SumarAuto(this.value);"><?php echo $subtotal_admin ?></textarea>
            <!--<input type="number" id="subtotal_admin" name="subtotal_admin" class="form-control" onchange="SumarAuto(this.value);"  value="</?php echo $subtotal_admin;?>">-->
           <div class="input-group-addon">.00</div>
       </div>
    </div>
</div>



<div class="form-group">
    <label for="eago_admin" class="col-sm-2 control-label">EAGO: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="number" class="form-control" id="eago_admin" name="eago_admin" placeholder="EAGO" value="<?php echo $eago_admin ?>" onchange="SumarAutomatico(this.value);">
            <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>



<div class="form-group">
    <label for="total_admin" class="col-sm-2 control-label">Total: </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <textarea class="form-control" id="total_admin" name="total_admin"></textarea>
            <div class="input-group-addon">.00</div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado: </label>
        <div class="col-sm-4">
            <select class="form-control" name="estado" id="estado">
                <option class="active" value="1" active <?php if ($status==1){echo "selected";}?>>Adeudo</option>
                <option value="2" <?php if ($status==2){echo "selected";}?>>Pagado</option>
            </select>
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