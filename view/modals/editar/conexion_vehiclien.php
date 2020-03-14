<!-- Form Modal -->
<div class="modal fade" id="modal_conexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form class="form-horizontal" role="form" method="post" id="conexion_vehiclien" name="conexion_vehiclien">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> Vincular Vehiculo</h4>
            </div>
            <div class="modal-body">
                <div id="loader1" class="text-center"></div>
                <div class="outer_div1"></div>
                <?php
                include('vehiclien.php');
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="guardar_datos" class="btn btn-success">Guardar</button>

            </div>
        </div>
    </form>
    </div>
</div>