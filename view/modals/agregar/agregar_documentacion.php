    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>


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
                        <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="col-sm-2 control-label">Apellido: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="apellido" name="apellido" placeholder="Apellido: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="vehiculo" name="vehiculo" placeholder="Vehiculo ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="documento" class="col-sm-2 control-label">Documentación: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="documento" name="documento" placeholder="Documentación ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facturaO" class="col-sm-2 control-label">Factura Origen: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="facturaO" name="facturaO" placeholder="Factura Origen ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="factura1" class="col-sm-2 control-label">Refactura 1: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="factura1" name="factura1" placeholder="Refactura 1 ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="factura2" class="col-sm-2 control-label">Refactura 2: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="factura2" name="factura2" placeholder="Refactura 2 ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="factura3" class="col-sm-2 control-label">Refactura 3: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="factura3" name="factura3" placeholder="Refactura 3 ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tenencia" class="col-sm-2 control-label">Tenencia y Refactura: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="tenencia" name="tenencia" placeholder="Tenencia y Refactura ">
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