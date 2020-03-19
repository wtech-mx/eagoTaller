<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
    if (empty($_POST['vehiculo'])) {
            $errors[] = "Vehiculo está vacío.";
        } elseif (
           !empty($_POST['vehiculo'])
    if (empty($_POST['placa'])) {
            $errors[] = "placa está vacío  ";
            ?> 
            <h1><?php echo $_POST["placa"]; ?></h1>
            <?php
        }   elseif (
            !empty($_POST['placa'])

        ){
        require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
            
            $vehiculo = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
            $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
 

            //Write register in to database 
            $sql = "INSERT INTO vehiculo_cliente (idcliente, idvehiculo) VALUES('".$cliente."','".$vehiculo."');";
            $query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Vehiculos-cliente ha sido agregado con éxito.";
            $placa = mysqli_real_escape_string($con,(strip_tags($_POST["placa"],ENT_QUOTES)));

            //Write register in to database 
            $sql = "INSERT INTO cliente (placa) VALUES('".$placa."');";
            $query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Seguro ha sido agregado con éxito.";
                //save_log('Categorías','Registro de categoría',$_SESSION['user_id']);
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
?>  
