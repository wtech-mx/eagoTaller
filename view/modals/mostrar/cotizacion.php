<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="SELECT * FROM cotizacion WHERE id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){

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

                $subtotal=$rw['subtotal'];
                $total=$rw['total'];

                $entidad=$rw['entidad'];
                $entidads=mysqli_query($con, "select * from estados where id=$entidad");
                $entidad_rw=mysqli_fetch_array($entidads);
                $nombre_entidad=$entidad_rw['nombre'];

                $servicio=$rw['servicio'];
                $servicios=mysqli_query($con, "select * from servicios where id=$servicio");
                $servicio_rw=mysqli_fetch_array($servicios);
                $nombre_servicio=$servicio_rw['nombre'];

                $entidad2=$rw['entidad2'];
                $entidad2s=mysqli_query($con, "select * from estados where id=$entidad2");
                $entidad2_rw=mysqli_fetch_array($entidad2s);
                $nombre_entidad2=$entidad2_rw['nombre'];

                $servicio2=$rw['servicio2'];
                $servicio2s=mysqli_query($con, "select * from servicios where id=$servicio2");
                $servicio2_rw=mysqli_fetch_array($servicio2s);
                $nombre_servicio2=$servicio2_rw['nombre'];

        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">

                        <div class="form-group">
                            <label for="nombre" class="col-sm-2 control-label">Nombre o empresa: </label>
                            <div class="col-sm-10">
                                <input type="text" disabled  class="form-control" id="nombre" name="nombre" placeholder="<?php echo  $nombre ?> ">
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="correo" class="col-sm-2 control-label">Correo: </label>
                                <div class="col-sm-10">
                                    <input type="email" disabled class="form-control" id="correo" name="correo" placeholder="<?php echo  $correo ?> ">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="mensaje" class="col-sm-2 control-label">Mensaje </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled id="mensaje" name="mensaje" placeholder="<?php echo $mensaje ?>" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cantidad" class="col-sm-2 control-label">Servicio: </label>
                                <div class="col-sm-3">
                                    <input type="number" disabled class="form-control" id="cantidad" name="cantidad" placeholder="<?php echo  $cantidad ?>">
                                </div>

                                <div class="col-sm-3">
                                    <select class="form-control" disabled name="servicio" id="servicio" >           <option  value=""><?php echo $nombre_servicio;?></option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <select class="form-control" disabled name="entidad" id="entidad" >
                                        <option  value="<?php echo $id;?>"><?php echo $nombre_entidad;?></option>     
                                    </select>
                                </div>
                            </div>

                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" disabled class="form-control" id="precio" name="precio" placeholder="<?php $precio ?>" value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                                <div class="col-sm-6">
                                    <input type="text" disabled class="form-control" id="descripcion" name="descripcion" placeholder="<?php echo $descripcion ?>">
                                </div>
                        </div>      
                <hr>

                        <div class="form-group">
                                <label for="cantidad2" class="col-sm-2 control-label">Servicio2: </label>
                                <div class="col-sm-2">
                                    <input type="number" disabled class="form-control" id="cantidad2" name="cantidad2" disabled placeholder="<?php echo  $cantidad2 ?>">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" disabled name="servicio2" id="servicio2" >
                                    <option value=""><?php echo $nombre_servicio2;?></option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <select class="form-control" disabled name="entidad2" id="entidad2" >
                                    <option value=""><?php echo $nombre_entidad2;?></option>
                                </select>
                            </div>

                         </div>

                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" disabled class="form-control" id="precio2" name="precio2" placeholder=" <?php $precio2 ?> " value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" id="Descripcion2" name="Descripcion2" placeholder="<?php echo $descripcion2 ?> ">
                            </div>
                        </div>  

                <hr>

         <!-- **************************************SERVICIO 3******************************************** -->
                        <div class="form-group">
                            <label for="cantidad3" class="col-sm-2 control-label">Servicio3: </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="cantidad3" name="cantidad3" disabled placeholder="<?php echo  $cantidad3 ?>">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" disabled name="servicio3" id="servicio3" >
                                    <option value=""><?php echo $nombre_servicios;?></option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <select class="form-control" disabled name="entidad3" id="entidad3" >
                                    <option value=""><?php echo $nombre_estados;?></option>
                                </select>
                            </div>                    
                        </div>

                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" disabled class="form-control" id="precio3" name="precio3" placeholder=" <?php $precio3 ?> " value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" id="Descripcion3" name="Descripcion3" placeholder=" <?php echo $descripcion3 ?> ">
                            </div>
                        </div> 

                <hr>
        <!-- **************************************SERVICIO 4******************************************** -->
                        <div class="form-group">
                            <label for="cantidad4" class="col-sm-2 control-label">Servicio4: </label>
                            <div class="col-sm-2">
                                <input type="number"  class="form-control" id="cantidad4" name="cantidad4" disabled placeholder="<?php echo  $cantidad4 ?>">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" disabled name="servicio4" id="servicio4" >
                                    <option value=""><?php echo $nombre_servicios;?></option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" disabled name="entidad4" id="entidad4" >
                                    <option value=""><?php echo $nombre_estados;?></option>
                                </select>
                            </div>

                        </div>

                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" disabled class="form-control" id="precio4" name="precio4" placeholder=" <?php $precio4 ?> " value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" id="descripcion4" name="descripcion4" placeholder=" <?php echo $descripcion4 ?> ">
                            </div>
                        </div> 

                <hr>                 
        <!-- **************************************SERVICIO 5******************************************** -->
                        <div class="form-group">
                            <label for="cantidad5" class="col-sm-2 control-label">Servicio5: </label>
                            <div class="col-sm-2">
                                <input type="number" disabled class="form-control" id="cantidad5" name="cantidad5" disabled placeholder="<?php echo  $cantidad5 ?>">
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control" disabled name="servicio5" id="servicio5" >
                                    <option value=""><?php echo $nombre_servicios;?></option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" disabled name="entidad5" id="entidad5" >
                                    <option value=""><?php echo $nombre_estados;?></option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">precio: </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" disabled class="form-control" id="precio5" name="precio5" placeholder=" <?php $precio5 ?> " value="" onchange="SumarAutomatico(this.value);">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" id="descripcion5" name="descripcion5" placeholder=" <?php echo $descripcion5 ?> ">
                            </div>
                        </div>                   

                        <hr>

         <!-- **************************************costos 5******************************************** -->

                    <div class="form-group">
                        <label for="subtotal" class="col-sm-2 control-label">Subtotal: </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" disabled class="form-control" id="subtotal" name="subtotal" placeholder=" <?php echo $subtotal ?> " value="" onchange="SumarAutomatico(this.value);">
                                <div class="input-group-addon">.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Total: </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" disabled class="form-control" id="total" name="total" placeholder=" <?php echo $total ?> " value="" onchange="SumarAutomatico(this.value);">
                                <div class="input-group-addon">.00</div>
                            </div>
                        </div>
                    </div>

</div>
