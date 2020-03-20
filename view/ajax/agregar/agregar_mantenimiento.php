<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['fecha_man'])){
			$errors[] = "Fecha de servicio está vacío.";
		}  elseif (empty($_POST['id_cliente'])) {
            $errors[] = "cliente está vacío.";
        } elseif (empty($_POST['datos'])) {
            $errors[] = "Datos está vacío.";
        }  elseif (
        	!empty($_POST['fecha_man'])
        	&& !empty($_POST['cliente'])
        	&& !empty($_POST['datos'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
			
			// escaping, additionally removing everything that could be (html/javascript-) code
            $fecha_man = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_man"],ENT_QUOTES)));
            $id_cliente = $_POST['cliente'];
            $datos = mysqli_real_escape_string($con,(strip_tags($_POST["datos"],ENT_QUOTES)));
            $trasladista = mysqli_real_escape_string($con,(strip_tags($_POST["trasladista"],ENT_QUOTES)));
            $taller = mysqli_real_escape_string($con,(strip_tags($_POST["taller"],ENT_QUOTES)));
            $otros = mysqli_real_escape_string($con,(strip_tags($_POST["otros"],ENT_QUOTES)));
            $vendedor = mysqli_real_escape_string($con,(strip_tags($_POST["vendedor"],ENT_QUOTES)));
            $origen = mysqli_real_escape_string($con,(strip_tags($_POST["origen"],ENT_QUOTES)));
			$fecha_carga=date("Y-m-d H:i:s");

			//Write register in to database 
			$sql = "INSERT INTO mantenimiento (fecha_man, id_cliente, datos, idtrasladista, idtaller, otros, vendedor, origen, fecha_carga) VALUES('".$fecha_man."','".$id_cliente."','".$datos."','".$trasladista."','".$taller."','".$otros."','".$vendedor."','".$origen."','".$fecha_carga."');";
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Servicio ha sido agregado con éxito.";
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