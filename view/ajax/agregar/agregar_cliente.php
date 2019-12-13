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
        }  elseif (empty($_POST['edad'])) {
            $errors[] = "Edad está vacío.";
        }  /* elseif (empty($_POST['kind'])) {
            $errors[] = "Kind está vacío.";
        }*/ elseif (
            !empty($_POST['nombre'])
            && !empty($_POST['apellido'])
            && !empty($_POST['telefono'])
            && !empty($_POST['correo'])
            && !empty($_POST['edad'])
        ){
        require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
            
            // escaping, additionally removing everything that could be (html/javascript-) code
            $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
    $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    $correo = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
    $edad = mysqli_real_escape_string($con,(strip_tags($_POST["edad"],ENT_QUOTES)));

    $manejo = mysqli_real_escape_string($con,(strip_tags($_POST["manejo"],ENT_QUOTES)));
    $colTrabajo = mysqli_real_escape_string($con,(strip_tags($_POST["colTrabajo"],ENT_QUOTES)));
    $colCasa = mysqli_real_escape_string($con,(strip_tags($_POST["colCasa"],ENT_QUOTES)));
    $cpTrabajo = mysqli_real_escape_string($con,(strip_tags($_POST["cpTrabajo"],ENT_QUOTES)));
    $cpCasa = mysqli_real_escape_string($con,(strip_tags($_POST["cpCasa"],ENT_QUOTES)));
    $km = mysqli_real_escape_string($con,(strip_tags($_POST["km"],ENT_QUOTES)));
    $entidad = mysqli_real_escape_string($con,(strip_tags($_POST["entidad"],ENT_QUOTES)));
    $tipo = mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));
           /* $kind = mysqli_real_escape_string($con,(strip_tags($_POST["kind"],ENT_QUOTES)));*/

            //Write register in to database 
            $sql = "INSERT INTO cliente (nombre, apellido, telefono, correo, edad, manejo, colTrabajo, colCasa, cpTrabajo, cpCasa, km, entidad, tipo ) VALUES('".$nombre."','".$apellido."','".$telefono."','".$correo."','".$edad."','".$manejo."','".$colTrabajo."','".$colCasa."','".$cpTrabajo."','".$cpCasa."','".$km."','".$entidad."','".$tipo."');";
            $query_new = mysqli_query($con,$sql);
            // si se ha agregado con éxito
            if ($query_new) {

                    $numeroMaximo="select max(id) as nuevo_cliente from cliente";
                    $idusernew_sql=mysqli_query($con,$numeroMaximo);
                    $idusernew_rw=mysqli_fetch_array($idusernew_sql);
                    $idusernew=$idusernew_rw['nuevo_cliente']; 
                    //agrego los permisos by amner saucedo sosa
                    $num_element=0;
                    $sw=true;

                $messages[] = "Cliente ha sido agregado con éxito.";
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
                <?php
            }
?>          