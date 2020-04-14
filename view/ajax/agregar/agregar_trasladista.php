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
        }   /* elseif (empty($_POST['kind'])) {
            $errors[] = "Kind está vacío.";
        }*/ elseif (
            !empty($_POST['nombre'])
            && !empty($_POST['apellido'])
            && !empty($_POST['telefono'])
            && !empty($_POST['correo'])
        ){
        require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
            
            // escaping, additionally removing everything that could be (html/javascript-) code
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
    $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    $correo = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
    $estado = mysqli_real_escape_string($con,(strip_tags($_POST["status"],ENT_QUOTES)));
           /* $kind = mysqli_real_escape_string($con,(strip_tags($_POST["kind"],ENT_QUOTES)));*/

            //Write register in to database 
            $sql = "INSERT INTO trasladista (nombre, apellido, telefono, correo, status ) VALUES('".$nombre."','".$apellido."','".$telefono."','".$correo."','".$estado."');";
            $query_new = mysqli_query($con,$sql);
            // si se ha agregado con éxito
            if ($query_new) {

                    $numeroMaximo="select max(id) as nuevo_trasladista from trasladista";
                    $idusernew_sql=mysqli_query($con,$numeroMaximo);
                    $idusernew_rw=mysqli_fetch_array($idusernew_sql);
                    $idusernew=$idusernew_rw['nuevo_trasladista']; 
                    //agrego los conexion by amner saucedo sosa
                    $num_element=0;
                    $sw=true;

                $messages[] = "Trasladista ha sido agregado con éxito.";
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