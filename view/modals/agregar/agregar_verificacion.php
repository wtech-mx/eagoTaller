    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>
<?php
    $query = "SELECT id_cliente, nombre, apellido FROM cliente ORDER BY nombre";
    $resultado=$con->query($query);

    $query = "SELECT id_empresa, nombre FROM empresa ORDER BY nombre";
    $resultado2=$con->query($query);
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
<script language="javascript">
            $(document).ready(function(){
                $("#empresa").change(function () {

                    $("#empresa option:selected").each(function () {
                        id_empresa = $(this).val();
                        $.post("view/modals/includes/agregar_vehiculo2.php", { id_empresa:id_empresa }, function(data){
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
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nuevo Servicio</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_veri" class="col-sm-2 control-label">Fecha Verificación: </label>
                        <div class="col-sm-10">
                            <input type="date"  class="form-control" id="fecha_veri" name="fecha_veri" placeholder="Fecha Verificación: ">
                        </div>
                    </div>

            <div class="form-group">
            <label class="col-sm-2 control-label">Empresa: </label>
                <div class="col-sm-10">
                    <select class="form-control" name="empresa" id="empresa">
                    <option value="0">Seleccionar Empresa</option>
                        <?php while($row = $resultado2->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_empresa']; ?>"><?php echo $row['nombre']; ?></option>
                    <?php } ?>
                    </select>
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
                        <label for="datos" class="col-sm-2 control-label">Descripcion: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="datos" name="datos" placeholder="Datos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="derechos" class="col-sm-2 control-label">Derechos: </label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="derechos" name="derechos" placeholder="Derechos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otros" class="col-sm-2 control-label">Otros: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="otros" name="otros" placeholder="Otros">
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
                        <label for="vendedor" class="col-sm-2 control-label">Vendedor: </label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="vendedor" name="vendedor" placeholder="Vendedor">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="origen" class="col-sm-2 control-label">Recoger en: </label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="origen" name="origen" placeholder="Dirección">
                        </div>
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