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
            $idcliente=$rw['idcliente'];
            $idvehiculo=$rw['idvehiculo'];
            $datos=$rw['datos'];
            $gasolina=$rw['gasolina'];
            $casetas=$rw['casetas'];
            $trasladistas=$rw['trasladistas'];
            $vendedor=$rw['vendedor'];
            $subtotal=$rw['subtotal'];
            $total=$rw['total'];
            $fecha_tras=$rw['fecha_tras'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="idcliente" class="col-sm-4 control-label">Cliente: </label>
    <div class="col-sm-8">
        <?php echo $idcliente;?>
    </div>
</div>
<div class="form-group">
    <label for="idvehiculo" class="col-sm-4 control-label">Vehiculo: </label>
    <div class="col-sm-8">
        <?php echo $idvehiculo;?>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-4 control-label">Datos...: </label>
    <div class="col-sm-8">
       <?php echo $datos;?>
    </div>
</div>
<div class="form-group">
    <label for="gasolina" class="col-sm-4 control-label">Gasolina: </label>
    <div class="col-sm-8">
       <?php echo $gasolina;?>
    </div>
</div>
<div class="form-group">
    <label for="casetas" class="col-sm-4 control-label">Casetas: </label>
    <div class="col-sm-8">
       <?php echo $casetas;?>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas" class="col-sm-4 control-label">Trasladistas: </label>
    <div class="col-sm-8">
       <?php echo $trasladistas;?>
    </div>
</div>
<div class="form-group">
    <label for="vendedor" class="col-sm-4 control-label">Vendedor: </label>
    <div class="col-sm-8">
       <?php echo $vendedor;?>
    </div>
</div>
<div class="form-group">
    <label for="subtotal" class="col-sm-4 control-label">Subtotal: </label>
    <div class="col-sm-8">
       <?php echo $subtotal;?>
    </div>
</div>
<div class="form-group">
    <label for="total" class="col-sm-4 control-label">Total: </label>
    <div class="col-sm-8">
       <?php echo $total;?>
    </div>
</div>
<div class="form-group">
    <label for="fecha_tras" class="col-sm-4 control-label">Fecha: </label>
    <div class="col-sm-8">
        <?php echo $fecha_tras;?>
    </div>
</div>