<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado 
    if (empty($_POST['reparacion'])){
            $errors[] = "Reparacion está vacío.";
        }  elseif (empty($_POST['trasladistas_admin'])) {
            $errors[] = "Trasladistas está vacío.";
        }   elseif (empty($_POST['gasolina_admin'])) {
            $errors[] = "Gasolina está vacío.";
        } elseif (empty($_POST['otros_admin'])) {
            $errors[] = "Otros está vacío.";
        } elseif (empty($_POST['asesor'])) {
            $errors[] = "asesor está vacío.";
        } elseif (empty($_POST['vendedor_admin'])) {
            $errors[] = "vendedor está vacío.";
        } elseif (
            !empty($_POST['reparacion'])
            && !empty($_POST['trasladistas_admin'])
            && !empty($_POST['gasolina_admin'])
            && !empty($_POST['otros_admin'])
            && !empty($_POST['asesor'])
            && !empty($_POST['vendedor_admin'])
        ){
        require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $reparacion = mysqli_real_escape_string($con,(strip_tags($_POST["reparacion"],ENT_QUOTES)));
        $trasladistas_admin = mysqli_real_escape_string($con,(strip_tags($_POST["trasladistas_admin"],ENT_QUOTES)));
        $gasolina_admin = mysqli_real_escape_string($con,(strip_tags($_POST["gasolina_admin"],ENT_QUOTES)));
        $otros_admin = mysqli_real_escape_string($con,(strip_tags($_POST["otros_admin"],ENT_QUOTES)));
        $asesor = mysqli_real_escape_string($con,(strip_tags($_POST["asesor"],ENT_QUOTES)));
        $vendedor_admin = mysqli_real_escape_string($con,(strip_tags($_POST["vendedor_admin"],ENT_QUOTES)));
        $subtotal_admin = mysqli_real_escape_string($con,(strip_tags($_POST["subtotal_admin"],ENT_QUOTES)));
        $eago_admin = mysqli_real_escape_string($con,(strip_tags($_POST["eago_admin"],ENT_QUOTES)));
        $total_admin = mysqli_real_escape_string($con,(strip_tags($_POST["total_admin"],ENT_QUOTES)));
        $estado= mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
               
        $id=intval($_POST['id']);
    // UPDATE data into database
    $sql = "UPDATE estetica SET reparacion='".$reparacion."', trasladistas_admin='".$trasladistas_admin."', gasolina_admin='".$gasolina_admin."', otros_admin='".$otros_admin."', asesor='".$asesor."', vendedor_admin='".$vendedor_admin."', subtotal_admin='".$subtotal_admin."', eago_admin='".$eago_admin."', total_admin='".$total_admin."', estado='".$estado."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El servicio ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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