    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nueva Cotizacion</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="col-sm-2 control-label">Correo: </label>
                        <div class="col-sm-10">
                            <input type="email" required class="form-control" id="correo" name="correo" placeholder="Correo">
                        </div>
                    </div>
      <!-- **************************************SERVICIO******************************************** -->
                    <div class="form-group">
                    	<label for="cantidad" class="col-sm-2 control-label">Servicio: </label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cant.">
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" name="servicio" id="servicio" >
                                <?php 
                                    $sql_tallers=mysqli_query($con,"select * from servicios order by nombre");
                                    while ($rw=mysqli_fetch_array($sql_tallers)){
                                        $id=$rw['id'];
                                        $nombre_servicio=$rw['nombre'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $nombre_servicio;?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        
                    </div>

                    <div class="form-group">
                        	<div class="col-sm-12">
                            	<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion ">
                        	</div>
                    </div>
         <!-- **************************************SERVICIO 2******************************************** -->
                    <div class="form-group">
                    	<label for="cantidad2" class="col-sm-2 control-label">Servicio2: </label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="cantidad2" name="cantidad2" placeholder="Cant.">
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" name="servicio2" id="servicio2" >
                                <?php 
                                    $sql_tallers=mysqli_query($con,"select * from servicios order by nombre");
                                    while ($rw=mysqli_fetch_array($sql_tallers)){
                                        $id=$rw['id'];
                                        $nombre_servicio=$rw['nombre'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $nombre_servicio;?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        
                    </div>

                    <div class="form-group">
                        	<div class="col-sm-12">
                            	<input type="text" class="form-control" id="descripcion2" name="descripcion2" placeholder="Descripcion ">
                        	</div>
                    </div>
         <!-- **************************************SERVICIO 3******************************************** -->
                    <div class="form-group">
                    	<label for="cantidad3" class="col-sm-2 control-label">Servicio3: </label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="cantidad3" name="cantidad3" placeholder="Cant.">
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" name="servicio3" id="servicio3" >
                                <?php 
                                    $sql_tallers=mysqli_query($con,"select * from servicios order by nombre");
                                    while ($rw=mysqli_fetch_array($sql_tallers)){
                                        $id=$rw['id'];
                                        $nombre_servicio=$rw['nombre'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $nombre_servicio;?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        
                    </div>

                    <div class="form-group">
                        	<div class="col-sm-12">
                            	<input type="text" class="form-control" id="descripcion3" name="descripcion3" placeholder="Descripcion ">
                        	</div>
                    </div>
        <!-- **************************************SERVICIO 4******************************************** -->
                    <div class="form-group">
                    	<label for="cantidad4" class="col-sm-2 control-label">Servicio4: </label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="cantidad4" name="cantidad4" placeholder="Cant.">
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" name="servicio4" id="servicio4" >
                                <?php 
                                    $sql_tallers=mysqli_query($con,"select * from servicios order by nombre");
                                    while ($rw=mysqli_fetch_array($sql_tallers)){
                                        $id=$rw['id'];
                                        $nombre_servicio=$rw['nombre'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $nombre_servicio;?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        
                    </div>

                    <div class="form-group">
                        	<div class="col-sm-12">
                            	<input type="text" class="form-control" id="descripcion4" name="descripcion4" placeholder="Descripcion ">
                        	</div>
                    </div>
        <!-- **************************************SERVICIO 5******************************************** -->
                    <div class="form-group">
                    	<label for="cantidad5" class="col-sm-2 control-label">Servicio5: </label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="cantidad5" name="cantidad5" placeholder="Cant.">
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" name="servicio5" id="servicio5" >
                                <?php 
                                    $sql_tallers=mysqli_query($con,"select * from servicios order by nombre");
                                    while ($rw=mysqli_fetch_array($sql_tallers)){
                                        $id=$rw['id'];
                                        $nombre_servicio=$rw['nombre'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $nombre_servicio;?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        
                    </div>

                    <div class="form-group">
                        	<div class="col-sm-12">
                            	<input type="text" class="form-control" id="descripcion5" name="descripcion5" placeholder="Descripcion ">
                        	</div>
                    </div>

					<div class="form-group">
                        <label for="precio" class="col-sm-2 control-label">Precio: </label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" id="precio" name="precio" placeholder="$$$">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subtotal" class="col-sm-2 control-label">Subtotal: </label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" id="subtotal" name="subtotal" placeholder="$$$">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Total: </label>
                        <div class="col-sm-10">
                            <input type="number" required class="form-control" id="total" name="total" placeholder="$$$">
                        </div>
                    </div>
                <div class="modal-footer">
                	<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
					</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar_datos" class="btn btn-primary">Agregar</button>
                </div>
            </form>
            <!-- /end form  -->
            </div>
        </div>
    </div>
    <!-- End Form Modal -->				