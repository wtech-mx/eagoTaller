<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado 
    if (empty($_POST['nombre'])) {
            $errors[] = "Nombre está vacío.";
        }  elseif (empty($_POST['apellido'])) {
            $errors[] = "Apellido está vacío.";
        }  elseif (empty($_POST['telefono'])) {
            $errors[] = "Telefono está vacío.";
        }  elseif (empty($_POST['correo'])) {
            $errors[] = "Correo Electronico está vacío.";
        }  elseif (empty($_POST['estado'])) {
            $errors[] = "Estado está vacío.";
        }/* elseif (empty($_POST['kind'])) {
            $errors[] = "Kind está vacío.";
        }*/ elseif (
            !empty($_POST['nombre'])
            && !empty($_POST['apellido'])
            && !empty($_POST['telefono'])
            && !empty($_POST['correo'])
            && !empty($_POST['estado'])
            /*&& !empty($_POST['password'])*/
            
        ){
        require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

    // escaping, additionally removing everything that could be (html/javascript-) code
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
    $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    $correo = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
    $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
    
    
    $id=intval($_POST['id']);

    // UPDATE data into database
    $sql = "UPDATE trasladista SET nombre='".$nombre."', apellido='".$apellido."', telefono='".$telefono."', correo='".$correo."', status='".$estado."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if($query){

        $messages[] = "El trasladista ha sido actualizado con éxito.";
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