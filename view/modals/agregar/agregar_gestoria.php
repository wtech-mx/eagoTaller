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
                        <label for="datos" class="col-sm-2 control-label">Datos: </label>
                        <div class="col-sm-10">
                            <input type="datos" required class="form-control" id="datos" name="datos" placeholder="Datos ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-sm-2 control-label">Fecha: </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aplaca" class="col-sm-2 control-label">Alta placas: </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="aplaca" name="aplaca" placeholder="Alta placas ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bplaca" class="col-sm-2 control-label">Baja placas</label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="bplaca" name="bplaca" placeholder="Baja placas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rplaca" class="col-sm-2 control-label">Reposición de placas: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="rplaca" name="rplaca" placeholder="Reposición de placas ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tarjeta" class="col-sm-2 control-label">Reposición de tarjeta: </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tarjeta" name="tarjeta" placeholder="Reposición de tarjeta ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otro" class="col-sm-2 control-label">Otro: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="otro" name="otro" placeholder="Otro ">
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