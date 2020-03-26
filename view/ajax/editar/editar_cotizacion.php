<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado 
    if (empty($_POST['nombre'])) {
            $errors[] = "Nombre está vacío.";
        }  /* elseif (empty($_POST['kind'])) {
            $errors[] = "Kind está vacío.";
        }*/ elseif (
            !empty($_POST['nombre'])
            && !empty($_POST['correo'])
            /*&& !empty($_POST['password'])*/
        ){
        require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

    // escaping, additionally removing everything that could be (html/javascript-) code
            $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
            $correo = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
            $mensaje = mysqli_real_escape_string($con,(strip_tags($_POST["mensaje"],ENT_QUOTES)));
            
            $servicio = mysqli_real_escape_string($con,(strip_tags($_POST["servicio"],ENT_QUOTES)));
            $cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
            $descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
            $entidad = mysqli_real_escape_string($con,(strip_tags($_POST["entidad"],ENT_QUOTES)));
            $precio = mysqli_real_escape_string($con,(strip_tags($_POST["precio"],ENT_QUOTES)));

            $servicio2 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio2"],ENT_QUOTES)));
            $cantidad2 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad2"],ENT_QUOTES)));
            $descripcion2 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion2"],ENT_QUOTES)));
            $entidad2 = mysqli_real_escape_string($con,(strip_tags($_POST["entidad2"],ENT_QUOTES)));
            $precio2 = mysqli_real_escape_string($con,(strip_tags($_POST["precio2"],ENT_QUOTES)));

            $servicio3 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio3"],ENT_QUOTES)));
            $cantidad3 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad3"],ENT_QUOTES)));
            $descripcion3 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion3"],ENT_QUOTES)));
            $entidad3 = mysqli_real_escape_string($con,(strip_tags($_POST["entidad3"],ENT_QUOTES)));
            $precio3 = mysqli_real_escape_string($con,(strip_tags($_POST["precio3"],ENT_QUOTES)));

            $servicio4 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio4"],ENT_QUOTES)));
            $cantidad4 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad4"],ENT_QUOTES)));
            $descripcion4 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion4"],ENT_QUOTES)));
            $entidad4 = mysqli_real_escape_string($con,(strip_tags($_POST["entidad4"],ENT_QUOTES)));
            $precio4 = mysqli_real_escape_string($con,(strip_tags($_POST["precio4"],ENT_QUOTES)));

            $servicio5 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio5"],ENT_QUOTES)));
            $cantidad5 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad5"],ENT_QUOTES)));
            $descripcion5 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion5"],ENT_QUOTES)));
            $entidad5 = mysqli_real_escape_string($con,(strip_tags($_POST["entidad5"],ENT_QUOTES)));
            $precio5 = mysqli_real_escape_string($con,(strip_tags($_POST["precio5"],ENT_QUOTES)));

            $subtotal = mysqli_real_escape_string($con,(strip_tags($_POST["subtotal"],ENT_QUOTES)));
            $total = mysqli_real_escape_string($con,(strip_tags($_POST["total"],ENT_QUOTES)));
        $id=intval($_POST['id']);

    // UPDATE data into database
     $sql = "UPDATE cotizacion SET nombre='".$nombre."', mensaje='".$mensaje."', correo='".$correo."', servicio='".$servicio."',  cantidad='".$cantidad."', descripcion='".$descripcion."', entidad='".$entidad."', precio='".$precio."', servicio2='".$servicio2."',  cantidad2='".$cantidad2."', descripcion2='".$descripcion2."', entidad2='".$entidad2."', precio2='".$precio2."', servicio3='".$servicio3."',  cantidad3='".$cantidad3."', descripcion3='".$descripcion3."', entidad3='".$entidad3."', precio3='".$precio3."', servicio4='".$servicio4."',  cantidad4='".$cantidad4."', descripcion4='".$descripcion4."', entidad4='".$entidad4."', precio4='".$precio4."', servicio5='".$servicio5."',  cantidad5='".$cantidad5."', descripcion5='".$descripcion5."', entidad5='".$entidad5."', precio5='".$precio5."', subtotal='".$subtotal."', total='".$total."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if($query){

        $messages[] = "Cotizacion ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualizaión falló. Por favor, regrese y vuelva a intentarlo.";
    }
        
    } else {
        $errors[] = "desconocido.";
    }
if (isset($errors)){
            
            ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> 
                    <?php
                        foreach ($errors as $error) {
                                echo $error;
                            }
                        ?>
            </div>
            <?php
            }
            if (isset($messages)){
                
                ?>
                <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Bien hecho!</strong>
                        <?php
                            foreach ($messages as $message) {
                                    echo $message;
                                }
                            ?>
                </div>

                <script type="text/javascript">
                        $("#actualizar_datos").val("");
                swal("¡Bien!", " <?php echo $message;?> ", "success");
                </script>
                
                <?php
            }
?>          