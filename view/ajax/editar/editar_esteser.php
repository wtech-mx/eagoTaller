<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado 
  
        require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
    
        $status= mysqli_real_escape_string($con,(strip_tags($_POST["status"],ENT_QUOTES)));
               
        $id=intval($_POST['id']);
    // UPDATE data into database
    $sql = "UPDATE estetica SET status='".$status."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El servicio ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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