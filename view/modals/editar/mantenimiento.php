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
            $id=$rw['id'];
            $id_cliente=$rw['id_cliente'];
            $id_empresa=$rw['id_empresa'];
            $idvehiculo=$rw['idvehiculo'];
            $fecha_man=$rw['fecha_man'];
            $datos=$rw['datos'];
            $idtrasladista=$rw['idtrasladista'];
            $idtaller=$rw['idtaller'];
            $otros=$rw['otros'];
            $vendedor=$rw['vendedor'];
            $origen=$rw['origen'];
            $created_at=$rw['fecha_carga'];
        }
    }  
    else{exit;}
$queryE = "SELECT id_cliente, nombre, apellido FROM cliente ORDER BY nombre";
    $resultadoE = $con->query($queryE);

    $query2 = "SELECT id_empresa, nombre FROM empresa ORDER BY nombre";
    $resultado2 = $con->query($query2);
    
    $queryM = "SELECT id, patente FROM vehiculo WHERE id_cliente = '$id_cliente' ORDER BY patente";
    $resultadoM = $con->query($queryM);  
?>
<script language="javascript">
            $(document).ready(function(){
                $("#cliente").change(function () {
                                       
                    $("#cliente option:selected").each(function () {
                        id_cliente = $(this).val();
                        $.post("../includes/agregar_vehiculo.php", { id_cliente: id_cliente }, function(data){
                            $("#vehiculo").html(data);
                        });            
                    });
                })
            });
</script>
<script language="javascript">
            $(document).ready(function(){
                $("#empresa").change(function () {
                                       
                    $("#empresa option:selected").each(function () {
                        id_empresa = $(this).val();
                        $.post("../includes/agregar_vehiculo2.php", { id_empresa: id_empresa }, function(data){
                            $("#vehiculo").html(data);
                        });            
                    });
                })
            });
</script>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="fecha_man" class="col-sm-2 control-label">Fecha Servicio: </label>
    <div class="col-sm-10">
        <input type="date"  class="form-control" id="fecha_man" name="fecha_man" placeholder="Fecha Servicio " value="<?php echo $fecha_man ?>">
    </div>
</div>
<div class="form-group">        
    <label class="col-sm-2 control-label">Empresa: </label>
        <div class="col-sm-10">
            <select class="form-control" name="empresa" id="empresa">
                <option value="0">Seleccionar Empresa</option>
                <?php while($row2 = $resultado2->fetch_assoc()) { ?>
                    <option value="<?php echo $row2['id_empresa']; ?>" <?php if($row2['id_empresa']==$id_empresa) { echo 'selected'; } ?>><?php echo $row2['nombre']; ?>
                <?php } ?>
            </select>
        </div>
</div>
<div class="form-group">        
    <label class="col-sm-2 control-label">Cliente: </label>
        <div class="col-sm-10">
            <select class="form-control" name="cliente" id="cliente">
                <option value="0">Seleccionar cliente</option>
                <?php while($rowE = $resultadoE->fetch_assoc()) { ?>
                    <option value="<?php echo $rowE['id_cliente']; ?>" <?php if($rowE['id_cliente']==$id_cliente) { echo 'selected'; } ?>><?php echo $rowE['nombre']; ?><?php echo ' ' ?><?php echo $rowE['apellido']; ?></option>
                <?php } ?>
            </select>
        </div>
</div>    
<div class="form-group">          
    <label class="col-sm-2 control-label">Vehiculo: </label>
        <div class="col-sm-10">
            <select class="form-control" name="vehiculo" id="vehiculo">
                <?php while($rowM = $resultadoM->fetch_assoc()) { ?>
                    <option value="<?php echo $rowM['id']; ?>" <?php if($rowM['id']==$idvehiculo) { echo 'selected'; } ?>><?php echo $rowM['patente']; ?></option>
                <?php } ?>
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
    <label for="trasladista" class="col-sm-2 control-label">Trasladista: </label>
    <div class="col-sm-10">
        <select class="form-control" name="trasladista" id="trasladista">
        <?php
            $trasladistas=mysqli_query($con,"select * from trasladista  where status=1 order by nombre");
            while ($rw=mysqli_fetch_array($trasladistas)) {
                if ($idtrasladista==$rw['id']){$selected1="selected";}else{$selected1="";}
        ?>
            <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']." ".$rw['apellido']?></option>
        <?php 
            }
        ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="taller" class="col-sm-2 control-label">Taller: </label>
    <div class="col-sm-10">
        <select class="form-control" name="taller" id="taller">
        <?php
            $tallers=mysqli_query($con,"select * from taller  where estado=1 order by nombre");
            while ($rw=mysqli_fetch_array($tallers)) {
                if ($idtaller==$rw['id']){$selected1="selected";}else{$selected1="";}
        ?>
            <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
        <?php 
            }
        ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="otros" class="col-sm-2 control-label">Otros: </label>
    <div class="col-sm-10">
        <textarea type="text" class="form-control" id="otros" name="otros" placeholder="otros "><?php echo $otros ?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="vendedor" class="col-sm-2 control-label">Vendedor: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="vendedor" name="vendedor" placeholder="Vendedor "><?php echo $vendedor ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="origen" class="col-sm-2 control-label">Recoger en: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="origen" name="origen" placeholder="Dirección "><?php echo $origen ?></textarea>
    </div>
</div>