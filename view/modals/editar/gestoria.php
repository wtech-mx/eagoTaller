<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from gestoria where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $id=$rw['id'];
            $fecha_ges=$rw['fecha_ges'];
            $id_cliente=$rw['id_cliente'];
            $idvehiculo=$rw['idvehiculo'];
            $datos=$rw['datos'];
            $idtrasladista=$rw['idtrasladista'];
            $idtaller=$rw['idtaller'];
            $otro=$rw['otro'];
            $idcarro=$rw['idcarro'];
            $aplaca=$rw['aplaca'];
            $bplaca=$rw['bplaca'];
            $rplaca=$rw['rplaca'];
            $tarjeta=$rw['tarjeta'];
            $origen=$rw['origen'];
            $created_at=$rw['fecha_carga'];
        }
    }   
    else{exit;}

    $queryE = "SELECT id_cliente, nombre, apellido FROM cliente ORDER BY nombre";
    $resultadoE = $con->query($queryE);
    
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
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id" method="POST">
<div class="form-group">
    <label for="fecha_ges" class="col-sm-2 control-label">Fecha Servicio: </label>
    <div class="col-sm-10">
        <input type="date"  class="form-control" id="fecha_ges" name="fecha_ges" placeholder="Fecha Servicio " value="<?php echo $fecha_ges ?>">
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
    <label for="otro" class="col-sm-2 control-label">Otro: </label>
    <div class="col-sm-10">
        <textarea type="text" class="form-control" id="otro" name="otro" placeholder="Otro "><?php echo $otro ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="aplaca" class="col-sm-2 control-label">Alta placa: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="aplaca" name="aplaca" placeholder="Alta placa "><?php echo $aplaca ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="bplaca" class="col-sm-2 control-label">Baja placa: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="bplaca" name="bplaca" placeholder="Baja placa "><?php echo $bplaca ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="rplaca" class="col-sm-2 control-label">Reposición placa: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="rplaca" name="rplaca" placeholder="Reposición placa "><?php echo $rplaca ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="tarjeta" class="col-sm-2 control-label">Reposición tarjeta: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="tarjeta" name="tarjeta" placeholder="Reposición tarjeta "><?php echo $tarjeta ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="origen" class="col-sm-2 control-label">Recoger en: </label>
    <div class="col-sm-10">
        <textarea type="text"  class="form-control" id="origen" name="origen" placeholder="Dirección "><?php echo $origen ?></textarea>
    </div>
</div>