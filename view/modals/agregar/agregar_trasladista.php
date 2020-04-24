    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>


    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nuevo Trasladista</h4>
                </div>
                <!--<div class="modal-body">
                    <div class="form-group">
                        <label for="dni" class="col-sm-2 control-label">DNI: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="dni" name="dni" placeholder="DNI: ">
                        </div>
                </div>-->
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="col-sm-2 control-label">Apellido: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="col-sm-2 control-label">Telefóno</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="telefono" name="telefono" placeholder="Telefóno">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="col-sm-2 control-label">Correo Electrónico: </label>
                        <div class="col-sm-10">
                            <p class=" text-muted">En caso de no tener correo, pasar al siguiente campo</p>
                            <input type="text"class="form-control" id="correo" name="correo" value="contacto@eago.com.mx">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Estado: </label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status" id="status">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>

<!-- ==========================================================================================
     ======================================FIN DATOS GENERALES=================================
     ==========================================================================================-->





                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar_datos" class="btn btn-primary">Agregar</button>
                </div>
                </div>
            </form>
            <!-- /end form  -->
            </div>
        </div>
    </div>
    <!-- End Form Modal -->