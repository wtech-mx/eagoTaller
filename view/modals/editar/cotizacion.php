<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from cotizacion where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);
            $nombre=$rw['nombre'];
            $correo=$rw['correo'];
            $mensaje=$rw['mensaje'];

            $servicio=$rw['servicio'];
            $entidad=$rw['entidad'];
            $cantidad=$rw['cantidad'];
            $descripcion=$rw['descripcion'];
            $precio=$rw['precio'];

            $servicio2=$rw['servicio2'];
            $entidad2=$rw['entidad2'];
            $cantidad2=$rw['cantidad2'];
            $descripcion2=$rw['descripcion2'];
            $precio2=$rw['precio2'];

            $servicio3=$rw['servicio3'];
            $entidad3=$rw['entidad3'];
            $cantidad3=$rw['cantidad3'];
            $descripcion3=$rw['descripcion3'];
            $precio3=$rw['precio3'];

            $servicio4=$rw['servicio4'];
            $entidad4=$rw['entidad4'];
            $cantidad4=$rw['cantidad4'];
            $descripcion4=$rw['descripcion4'];
            $precio4=$rw['precio4'];

            $servicio5=$rw['servicio5'];
            $entidad5=$rw['entidad5'];
            $cantidad5=$rw['cantidad5'];
            $descripcion5=$rw['descripcion5'];
            $precio5=$rw['precio5'];  

            $subtotal=$rw['subtotal'];
            $total=$rw['total'];
        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">

                        <div class="form-group">
                            <label for="nombre" class="col-sm-2 control-label">Nombre/Empresa</label>
                            <div class="col-sm-10">
                                <textarea type="text"  class="form-control" id="nombre" name="nombre" placeholder="Nombre "><?php echo $nombre ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="correo" class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                <textarea type="text"  class="form-control" id="correo" name="correo" placeholder="Correo Del Destinatario"><?php echo $correo ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mensaje" class="col-sm-2 control-label">Mensaje</label>
                            <div class="col-sm-10">
                                <textarea type="text"  class="form-control" id="mensaje" name="mensaje" placeholder="Mensaje " rows="3"><?php echo $mensaje ?></textarea>
                            </div>
                        </div>

                    <hr>
                        <div class="form-group">
                            <label for="cantidad" class="col-sm-2 control-label">Servicio</label>
                            <div class="col-sm-2">
                                <textarea type="number"  class="form-control" id="cantidad" name="cantidad" placeholder="Cant. "><?php echo $cantidad ?></textarea>
                            </div>

                        
                            <div class="col-sm-3">
                                <select class="form-control" name="servicio" id="servicio">
                                <option value="0">Seleccionar Empresa</option> 
                                    <?php
                                        $servicios=mysqli_query($con,"select * from servicios order by nombre");
                                        while ($rw=mysqli_fetch_array($servicios)) {
                                            if ($servicio==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="entidad" id="entidad">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $entidads=mysqli_query($con,"select * from estados order by nombre");
                                        while ($rw=mysqli_fetch_array($entidads)) {
                                            if ($entidad==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
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
                                        <textarea type="number" class="form-control" id="precio" name="precio" placeholder="Precio" onchange="SumarAutomatico(this.value);"><?php echo $precio ?></textarea>
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

            
                                <div class="col-sm-6">
                                <textarea type="text"  class="form-control" id="descripcion" name="descripcion" placeholder="descripcion "><?php echo $descripcion ?></textarea>
                                </div>
                        </div>      
                <hr>

                        
                        <div class="form-group">
                            <label for="cantidad2" class="col-sm-2 control-label">Servicio2</label>
                            <div class="col-sm-2">
                                <textarea type="number"  class="form-control" id="cantidad2" name="cantidad2" placeholder="Cant. "><?php echo $cantidad2 ?></textarea>
                            </div>

                        
                            <div class="col-sm-3">
                                <select class="form-control" name="servicio2" id="servicio2">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $servicio2s=mysqli_query($con,"select * from servicios order by nombre");
                                        while ($rw=mysqli_fetch_array($servicio2s)) {
                                            if ($servicio2==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="entidad2" id="entidad2">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $entidad2s=mysqli_query($con,"select * from estados order by nombre");
                                        while ($rw=mysqli_fetch_array($entidad2s)) {
                                            if ($entidad2==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio2: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <textarea type="number" class="form-control" id="precio2" name="precio2" placeholder="Precio2" onchange="SumarAutomatico(this.value);"><?php echo $precio2 ?></textarea>
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

            
                                <div class="col-sm-6">
                                <textarea type="text"  class="form-control" id="descripcion2" name="descripcion2" placeholder="descripcion2"><?php echo $descripcion2 ?></textarea>
                                </div>
                        </div>
                <hr>

         <!-- **************************************SERVICIO 3******************************************** -->
                        
                        <div class="form-group">
                            <label for="cantidad3" class="col-sm-2 control-label">Servicio3</label>
                            <div class="col-sm-2">
                                <textarea type="number"  class="form-control" id="cantidad3" name="cantidad3" placeholder="Cant."><?php echo $cantidad3 ?></textarea>
                            </div>

                        
                            <div class="col-sm-3">
                                <select class="form-control" name="servicio3" id="servicio3">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $servicio3s=mysqli_query($con,"select * from servicios order by nombre");
                                        while ($rw=mysqli_fetch_array($servicio3s)) {
                                            if ($servicio3==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="entidad3" id="entidad3">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $entidad3s=mysqli_query($con,"select * from estados order by nombre");
                                        while ($rw=mysqli_fetch_array($entidad3s)) {
                                            if ($entidad3==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio3: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <textarea type="number" class="form-control" id="precio3" name="precio3" placeholder="Precio3" onchange="SumarAutomatico(this.value);"><?php echo $precio3 ?></textarea>
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

            
                                <div class="col-sm-6">
                                <textarea type="text"  class="form-control" id="descripcion3" name="descripcion3" placeholder="descripcion3 "><?php echo $descripcion3 ?></textarea>
                                </div>
                        </div>

                <hr>
        <!-- **************************************SERVICIO 4******************************************** -->
                        
                        <div class="form-group">
                            <label for="cantidad4" class="col-sm-2 control-label">Servicio4</label>
                            <div class="col-sm-2">
                                <textarea type="number"  class="form-control" id="cantidad4" name="cantidad4" placeholder="Cant. "><?php echo $cantidad4 ?></textarea>
                            </div>

                        
                            <div class="col-sm-3">
                                <select class="form-control" name="servicio4" id="servicio4">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $servicio4s=mysqli_query($con,"select * from servicios order by nombre");
                                        while ($rw=mysqli_fetch_array($servicio4s)) {
                                            if ($servicio4==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="entidad4" id="entidad4">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $entidad4s=mysqli_query($con,"select * from estados order by nombre");
                                        while ($rw=mysqli_fetch_array($entidad4s)) {
                                            if ($entidad4==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio4: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <textarea type="number" class="form-control" id="precio4" name="precio4" placeholder="Precio4" onchange="SumarAutomatico(this.value);"><?php echo $precio4 ?></textarea>
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

            
                                <div class="col-sm-6">
                                <textarea type="text"  class="form-control" id="descripcion4" name="descripcion4" placeholder="descripcion4 "><?php echo $descripcion4 ?></textarea>
                                </div>
                        </div>

                <hr>                 
        <!-- **************************************SERVICIO 5******************************************** -->
                        
                        <div class="form-group">
                            <label for="cantidad5" class="col-sm-2 control-label">Servicio5</label>
                            <div class="col-sm-2">
                                <textarea type="number"  class="form-control" id="cantidad5" name="cantidad5" placeholder="Cant. "><?php echo $cantidad5 ?></textarea>
                            </div>

                        
                            <div class="col-sm-3">
                                <select class="form-control" name="servicio5" id="servicio5">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $servicio5s=mysqli_query($con,"select * from servicios order by nombre");
                                        while ($rw=mysqli_fetch_array($servicio5s)) {
                                            if ($servicio5==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" name="entidad5" id="entidad5">
                                    <option value="0">Seleccionar Empresa</option>
                                    <?php
                                        $entidad5s=mysqli_query($con,"select * from estados order by nombre");
                                        while ($rw=mysqli_fetch_array($entidad5s)) {
                                            if ($entidad5==$rw['id']){$selected1="selected";}else{$selected1="";}
                                    ?>
                                        <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['nombre']?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio5: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <textarea type="number" class="form-control" id="precio5" name="precio5" placeholder="Precio5" onchange="SumarAutomatico(this.value);"><?php echo $precio5 ?></textarea>
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

            
                            <div class="col-sm-6">
                                <textarea type="text"  class="form-control" id="descripcion5" name="descripcion5" placeholder="descripcion5 "><?php echo $descripcion5 ?></textarea>
                            </div>
                        </div>

                        <hr>

         <!-- **************************************costos 5******************************************** -->

                    <div class="form-group">
                            <label for="subtotal" class="col-sm-2 control-label">subtotal: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <textarea type="number" class="form-control" id="subtotal" name="subtotal" placeholder="subtotal" onchange="SumarAutomatico(this.value);"><?php echo $subtotal ?></textarea>
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                    <div class="form-group">
                            <label for="total" class="col-sm-2 control-label">total: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <textarea type="number" class="form-control" id="total" name="total" placeholder="total" onchange="SumarAutomatico(this.value);"><?php echo $total ?></textarea>
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>
                </div>