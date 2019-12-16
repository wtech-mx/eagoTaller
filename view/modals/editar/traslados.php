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
            $id=$rw['id'];
            $fecha_tras=$rw['fecha_tras'];
            $idcliente=$rw['idcliente'];
            $idvehiculo=$rw['idvehiculo'];
            $datos=$rw['datos'];
            $gasolina=$rw['gasolina'];
            $casetas=$rw['casetas'];
            $trasladistas=$rw['trasladistas'];
            $vendedor=$rw['vendedor'];
            $subtotal=$rw['subtotal'];
            $total=$rw['total'];
            $created_at=$rw['fecha_carga'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="fecha_tras" class="col-sm-2 control-label">Fecha traslado: </label>
    <div class="col-sm-10">
        <input type="date" required class="form-control" id="fecha_tras" name="fecha_tras" placeholder="Fecha traslado " value="<?php echo $fecha_tras ?>">
    </div>
</div>
<div class="form-group">
<label for="cliente" class="col-sm-2 control-label">Cliente: </label>
    <div class="col-sm-4">
        <select class="form-control" name="cliente" id="cliente" required>
            <?php 
                $sql_clientes=mysqli_query($con,"select * from cliente where status=1 order by nombre");
                while ($rw=mysqli_fetch_array($sql_clientes)){
                    $idcliente=$rw['id'];
                    $nombre_cliente=$rw['nombre']." ".$rw['apellido'];
                ?>
                <option value="<?php echo $idcliente;?>"><?php echo $nombre_cliente;?></option>
                <?php
                }
            ?>
        </select>    
    </div>
</div>
<div class="form-group">
    <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
    <div class="col-sm-10">
        <select class="form-control" name="vehiculo" id="vehiculo">
            <option value="">--- SELECCIONA ---</option>
        <?php
            $vehiculos=mysqli_query($con,"select * from vehiculo where estado=1");
            while ($rw=mysqli_fetch_array($vehiculos)) {
                if ($idvehiculo==$rw['id']){$selected1="selected";}else{$selected1="";}
        ?>
            <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['patente']?></option>
        <?php 
            }
        ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="datos" class="col-sm-2 control-label">Datos: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="datos" name="datos" placeholder="Datos "><?php echo $datos ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="gasolina" class="col-sm-2 control-label">Gasolina: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="gasolina" name="gasolina" placeholder="Gasolina "><?php echo $gasolina ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="casetas" class="col-sm-2 control-label">Casetas: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="casetas" name="casetas" placeholder="Casetas "><?php echo $casetas ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas" class="col-sm-2 control-label">Trasladistas: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="trasladistas" name="trasladistas" placeholder="Trasladistas "><?php echo $trasladistas ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="vendedor" class="col-sm-2 control-label">Vendedor: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="vendedor" name="vendedor" placeholder="Vendedor "><?php echo $vendedor ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="subtotal" class="col-sm-2 control-label">Subtotal: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal "><?php echo $subtotal ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="total" class="col-sm-2 control-label">Total: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="total" name="total" placeholder="Total "><?php echo $total ?></textarea>
    </div>
</div>

