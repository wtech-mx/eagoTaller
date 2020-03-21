    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>
<?php
    $query = "SELECT id_cliente, nombre, apellido FROM cliente ORDER BY nombre";
    $resultado=$con->query($query);
?>
<script language="javascript">
            $(document).ready(function(){
                $("#cliente").change(function () {
                    
                    $("#cliente option:selected").each(function () {
                        id_cliente = $(this).val();
                        $.post("view/modals/includes/agregar_vehiculo.php", { id_cliente:id_cliente }, function(data){
                            $("#vehiculo").html(data);
                        });            
                    });
                })
            });
</script>
    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nuevo Servicio</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_ges" class="col-sm-2 control-label">Fecha Servicio: </label>
                        <div class="col-sm-10">
                            <input type="date"  class="form-control" id="fecha_ges" name="fecha_ges" placeholder="Fecha Servicio ">
                        </div>
                    </div>
        <div class="form-group">                
            <label class="col-sm-2 control-label">Cliente: </label>
                <div class="col-sm-10">
                    <select class="form-control" name="cliente" id="cliente">
                    <option value="0">Seleccionar Cliente</option>
                        <?php while($row = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['nombre']; ?><?php echo ' ' ?><?php echo $row['apellido']; ?></option>
                    <?php } ?>
                    </select>
                </div>
        </div>

        <div class="form-group">               
            <label class="col-sm-2 control-label">Vehiculo: </label>
                <div class="col-sm-10">
                    <select class="form-control" name="vehiculo" id="vehiculo"></select>
                </div>
        </div>
        <div class="form-group">
            <label for="datos" class="col-sm-2 control-label">Descripción: </label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" id="datos" name="datos" placeholder="Descripción">
                </div>
        </div>
        <div class="form-group">
            <label for="taller" class="col-sm-2 control-label">Taller: </label>
                <div class="col-sm-10">
                    <select class="form-control" name="taller" id="taller" >
                        <?php 
                            $sql_tallers=mysqli_query($con,"select * from taller where estado=1 order by nombre");
                            while ($rw=mysqli_fetch_array($sql_tallers)){
                                $idtaller=$rw['id'];
                                $nombre_taller=$rw['nombre'];
                            ?>
                            <option value="<?php echo $idtaller;?>"><?php echo $nombre_taller;?></option>
                            <?php
                            }
                        ?>
                    </select>    
                </div>
        </div>
        <div class="form-group">
            <label for="trasladista" class="col-sm-2 control-label">Trasladista </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="trasladista" id="trasladista" required>
                                <?php 
                                    $sql_trasladistas=mysqli_query($con,"select * from trasladista where status=1 order by nombre");
                                    while ($rw=mysqli_fetch_array($sql_trasladistas)){
                                        $idtrasladista=$rw['id'];
                                        $nombre_trasladista=$rw['nombre']." ".$rw['apellido'];
                                    ?>
                                    <option value="<?php echo $idtrasladista;?>"><?php echo $nombre_trasladista;?></option>
                                    <?php
                                    }
                                ?>
                            </select>    
                        </div>
        </div>
        <div class="form-group">
            <label for="otro" class="col-sm-2 control-label">Otro: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="otro" name="otro" placeholder="Otro">
            </div>
        </div>
        <div class="form-group">
            <label for="aplaca" class="col-sm-2 control-label">Alta placa: </label>
            <div class="col-sm-10">
                <input type="date"  class="form-control" id="aplaca" name="aplaca" placeholder="Alta placa">
            </div>
        </div>
        <div class="form-group">
            <label for="bplaca" class="col-sm-2 control-label">Baja placa: </label>
            <div class="col-sm-10">
                <input type="date"  class="form-control" id="bplaca" name="bplaca" placeholder="Baja placa">
            </div>
        </div>
        <div class="form-group">
            <label for="rplaca" class="col-sm-2 control-label">Reposición placa: </label>
            <div class="col-sm-10">
                <input type="date"  class="form-control" id="rplaca" name="rplaca" placeholder="Reposición placa">
            </div>
        </div>
        <div class="form-group">
            <label for="tarjeta" class="col-sm-2 control-label">Reposición tarjeta: </label>
            <div class="col-sm-10">
                <input type="date"  class="form-control" id="tarjeta" name="tarjeta" placeholder="Reposición tarjeta">
            </div>
        </div>
        <div class="form-group">
            <label for="origen" class="col-sm-2 control-label">Recoger en: </label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="origen" name="origen" placeholder="Dirección">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="guardar_datos" class="btn btn-primary">Agregar</button>
        </div>
            </form>
            <!-- /end form  -->
            </div>
        </div>
    </div>
    <!-- End Form Modal -->