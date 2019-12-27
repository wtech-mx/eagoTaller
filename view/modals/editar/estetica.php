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
            $idvehiculo=$rw['idvehiculo'];
            $datos=$rw['datos'];
            $trasladistas=$rw['trasladistas'];
            $gasolina=$rw['gasolina'];
            $otros=$rw['otros'];
            $vendedor=$rw['vendedor'];
            $created_at=$rw['fecha_carga'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="fecha_rep" class="col-sm-2 control-label">Fecha Servicio: </label>
    <div class="col-sm-10">
        <input type="date" required class="form-control" id="fecha_rep" name="fecha_rep" placeholder="Fecha Servicio " value="<?php echo $fecha_rep ?>">
    </div>
</div>
<div class="form-group">
<label for="cliente" class="col-sm-2 control-label">Cliente: </label>
    <div class="col-sm-10">
        <select class="form-control" name="cliente" id="cliente" required>
            <?php 
                $sql_clientes=mysqli_query($con,"select * from cliente");
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
            $vehiculos=mysqli_query($con,"select * from vehiculo  where estado=1 order by patente");
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
    <label for="datos" class="col-sm-2 control-label">Descripción: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="datos" name="datos" placeholder="Descripción "><?php echo $datos ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="trasladistas" class="col-sm-2 control-label">Trasladistas: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="trasladistas" name="trasladistas" placeholder="Trasladistas "><?php echo $trasladistas ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="gasolina" class="col-sm-2 control-label">costo gasolina: </label>
    <div class="col-sm-10">
        <textarea type="number" required class="form-control" id="gasolina" name="gasolina" placeholder="Gasolina $"><?php echo $gasolina ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="otros" class="col-sm-2 control-label">otros: </label>
    <div class="col-sm-10">
        <textarea type="text" class="form-control" id="otros" name="otros" placeholder="otros "><?php echo $otros ?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="vendedor" class="col-sm-2 control-label">Vendedor: </label>
    <div class="col-sm-10">
        <textarea type="text" required class="form-control" id="vendedor" name="vendedor" placeholder="Vendedor "><?php echo $vendedor ?></textarea>
    </div>
</div>