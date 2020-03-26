<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="SELECT * FROM cliente WHERE id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){

            $rw=mysqli_fetch_array($query);
            $rw=mysqli_fetch_array($query);
            $nombre=$rw['nombre'];
            $correo=$rw['correo'];
            $mensaje=$rw['mensaje'];


            $cantidad=$rw['cantidad'];
            $descripcion=$rw['descripcion'];
            $precio=$rw['precio'];

            $cantidad2=$rw['cantidad2'];
            $descripcion2=$rw['descripcion2'];
            $precio2=$rw['precio2'];

            $cantidad3=$rw['cantidad3'];
            $descripcion3=$rw['descripcion3'];
            $precio3=$rw['precio3'];

            $cantidad3=$rw['cantidad3'];
            $descripcion3=$rw['descripcion3'];
            $precio3=$rw['precio3'];

            $cantidad4=$rw['cantidad4'];
            $descripcion4=$rw['descripcion4'];
            $precio4=$rw['precio4'];

            $cantidad5=$rw['cantidad5'];
            $descripcion5=$rw['descripcion5'];
            $precio5=$rw['precio5'];         


            $idservicios=$rw['id'];
            $servicios=mysqli_query($con, "SELECT * FROM servicios WHERE id=$idservicios");
            $servicios_rw=mysqli_fetch_array($servicios);
            $nombre_servicios=$servicios_rw['nombre'];

            $idestados=$rw['id'];
            $estados=mysqli_query($con, "SELECT * FROM estados WHERE id=$idestados");
            $estados_rw=mysqli_fetch_array($estados);
            $nombre_estados=$estados_rw['nombre'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">

                        <div class="form-group">
                            <label for="nombre" class="col-sm-2 control-label">Nombre o empresa: </label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre o empresa: ">
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="correo" class="col-sm-2 control-label">Correo: </label>
                                <div class="col-sm-10">
                                    <input type="email"  class="form-control" id="correo" name="correo" placeholder="Correo del destinatario ">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="mensaje" class="col-sm-2 control-label">Mensaje </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="mensaje" placeholder="Mensaje de bienvenida a la empresa o cliente" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cantidad" class="col-sm-2 control-label">Servicio: </label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cant.">
                                </div>

                                <div class="col-sm-3">
                                    <select class="form-control" name="servicio" id="servicio" >
                                       <option value="0">Seleccionas</option>
                                        <?php 
                                            $sql_tallers=mysqli_query($con,"SELECT * FROM servicios order by nombre");
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

                                <div class="col-sm-3">
                                    <select class="form-control" name="entidad" id="entidad" >
                                        <option value="0">Seleccionar </option>
                                        <?php 
                                            $sql_tallers=mysqli_query($con,"SELECT * FROM estados order by nombre");
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
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

            
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion: ">
                                </div>
                        </div>      
                <hr>

                        <div class="form-group">
                                <label for="cantidad2" class="col-sm-2 control-label">Servicio2: </label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="cantidad2" name="cantidad2" placeholder="Cant.">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="servicio2" id="servicio2" >
                                    <option value="0">Seleccionar </option>
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM servicios order by nombre");
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

                            <div class="col-sm-3">
                                <select class="form-control" name="entidad2" id="entidad2" >
                                    <option value="0">Seleccionar </option>
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM estados order by nombre");
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
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" class="form-control" id="precio2" name="precio2" placeholder="precio2" value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text"  class="form-control" id="Descripcion2" name="Descripcion2" placeholder="Descripcion2: ">
                            </div>
                        </div>  

                <hr>

         <!-- **************************************SERVICIO 3******************************************** -->
                        <div class="form-group">
                            <label for="cantidad3" class="col-sm-2 control-label">Servicio3: </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="cantidad3" name="cantidad3" placeholder="Cant.">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="servicio3" id="servicio3" >
                                    <option value="0">Seleccionar </option>
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM servicios order by nombre");
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

                            <div class="col-sm-3">
                                <select class="form-control" name="entidad3" id="entidad3" >
                                    <option value="0">Seleccionar </option>
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM estados order by nombre");
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
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" class="form-control" id="precio3" name="precio3" placeholder="precio3" value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text"  class="form-control" id="Descripcion3" name="Descripcion3" placeholder="Descripcion3: ">
                            </div>
                        </div> 

                <hr>
        <!-- **************************************SERVICIO 4******************************************** -->
                        <div class="form-group">
                            <label for="cantidad4" class="col-sm-2 control-label">Servicio4: </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="cantidad4" name="cantidad4" placeholder="Cant.">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="servicio4" id="servicio4" >
                                    <option value="0">Seleccionar </option>
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM servicios order by nombre");
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
                            <div class="col-sm-3">
                                <select class="form-control" name="entidad4" id="entidad4" >
                                    <option value="0">Seleccionar </option>
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM estados order by nombre");
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
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" class="form-control" id="precio4" name="precio4" placeholder="precio4" value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text"  class="form-control" id="descripcion4" name="descripcion4" placeholder="descripcion4: ">
                            </div>
                        </div> 

                <hr>                 
        <!-- **************************************SERVICIO 5******************************************** -->
                        <div class="form-group">
                            <label for="cantidad5" class="col-sm-2 control-label">Servicio5: </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="cantidad5" name="cantidad5" placeholder="Cant.">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="servicio5" id="servicio5" >
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM servicios order by nombre");
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
                            <div class="col-sm-3">
                                <select class="form-control" name="entidad5" id="entidad5" >
                                    <option value="0">Seleccionar </option>
                                    <?php 
                                        $sql_tallers=mysqli_query($con,"SELECT * FROM estados order by nombre");
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
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" class="form-control" id="precio5" name="precio5" placeholder="precio5" value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text"  class="form-control" id="descripcion5" name="descripcion5" placeholder="descripcion5: ">
                            </div>
                        </div>                   

                        <hr>

         <!-- **************************************costos 5******************************************** -->

                    <div class="form-group">
                        <label for="subtotal" class="col-sm-2 control-label">Subtotal: </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal" value="" onchange="SumarAutomatico(this.value);">
                                <div class="input-group-addon">.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Total: </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="total" name="total" placeholder="Total" value="" onchange="SumarAutomatico(this.value);">
                                <div class="input-group-addon">.00</div>
                            </div>
                        </div>
                    </div>
                </div>