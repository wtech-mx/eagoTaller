    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>


    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nuevo Cliente</h4>
                </div>
                <div class="modal-body">
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
                            <input type="text"  class="form-control" id="telefono" name="telefono" placeholder="Telefóno">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="col-sm-2 control-label">Correo Electrónico: </label>
                        <div class="col-sm-10">
                            <input type="email"  class="form-control" id="correo" name="correo" placeholder="Correo Electrónico: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edad" class="col-sm-2 control-label">Edad: </label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="edad" name="edad" placeholder="Edad ">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="empresa" class="col-sm-2 control-label">Empresa: </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="empresa" id="empresa" >
                                            <?php 
                                                $sql_tallers=mysqli_query($con,"select * from empresa where estado=1 order by nombre");
                                                while ($rw=mysqli_fetch_array($sql_tallers)){
                                                    $idempresa=$rw['id'];
                                                    $nombre_empresa=$rw['nombre'];
                                                ?>
                                                <option value="<?php echo $idempresa;?>"><?php echo $nombre_empresa;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                    </div>
<!-- ==========================================================================================
     ======================================FIN DATOS GENERALES=================================
     ==========================================================================================-->

                    <div class="form-group">
                        <label for="manejo" class="col-sm-2 control-label">Vencimiento licencia: </label>
                        <div class="col-sm-10">
                            <input type="date"  class="form-control" id="manejo" name="manejo" placeholder="Licencia de Manejo ">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="tipo" class="col-sm-2 control-label">Tipo de licencia </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipo" id="tipo">
                        <!-- Opciones de la lista -->
                        <option value="1">Tipo “A”</option>
                        <option value="2" selected>Permanente</option> <!-- Opción por defecto -->
                        <option value="3">Tipo “B” dos años</option>
                        <option value="4">Tipo “B” tres años</option>
                        <option value="5">Tipo “E” dos años</option>
                        <option value="6">Tipo “E” tres años</option>
                      </select>
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label for="entidad" class="col-sm-2 control-label">Entidad: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="entidad" name="entidad" placeholder="Entidad ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="colTrabajo" class="col-sm-2 control-label">Col. Trabajo: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colTrabajo" name="colTrabajo" placeholder="Col. Trabajo ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cpTrabajo" class="col-sm-2 control-label">CP. Trabajo: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cpTrabajo" name="cpTrabajo" placeholder="CP. Trabajo ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="colCasa" class="col-sm-2 control-label">col. Casa: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colCasa" name="colCasa" placeholder="Col. Casa ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cpCasa" class="col-sm-2 control-label">CP. Casa: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cpCasa" name="cpCasa" placeholder="CP. Casa ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="km" class="col-sm-2 control-label">KM: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="km" name="km" placeholder="KM por semana ">
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