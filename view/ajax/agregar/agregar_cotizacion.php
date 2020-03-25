<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['nombre'])) {
            $errors[] = "Nombre está vacío.";
        }  elseif (
        	!empty($_POST['nombre'])
        	
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
			
			// escaping, additionally removing everything that could be (html/javascript-) code
            $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
            $correo = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
            
            $servicio = mysqli_real_escape_string($con,(strip_tags($_POST["servicio"],ENT_QUOTES)));
            $cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
            $descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));

            $servicio2 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio2"],ENT_QUOTES)));
            $cantidad2 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad2"],ENT_QUOTES)));
            $descripcion2 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion2"],ENT_QUOTES)));

            $servicio3 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio3"],ENT_QUOTES)));
            $cantidad3 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad3"],ENT_QUOTES)));
            $descripcion3 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion3"],ENT_QUOTES)));

            $servicio4 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio4"],ENT_QUOTES)));
            $cantidad4 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad4"],ENT_QUOTES)));
            $descripcion4 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion4"],ENT_QUOTES)));

            $servicio5 = mysqli_real_escape_string($con,(strip_tags($_POST["servicio5"],ENT_QUOTES)));
            $cantidad5 = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad5"],ENT_QUOTES)));
            $descripcion5 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion5"],ENT_QUOTES)));

            $precio = mysqli_real_escape_string($con,(strip_tags($_POST["precio"],ENT_QUOTES)));
            $subtotal = mysqli_real_escape_string($con,(strip_tags($_POST["subtotal"],ENT_QUOTES)));
            $total = mysqli_real_escape_string($con,(strip_tags($_POST["total"],ENT_QUOTES)));
			$fecha_carga=date("Y-m-d H:i:s");

			//Write register in to database 
			$sql = "INSERT INTO cotizacion (nombre, correo, servicio, cantidad, descripcion, servicio2, cantidad2, descripcion2, servicio3, cantidad3, descripcion3, servicio4, cantidad4, descripcion4, servicio5, cantidad5, descripcion5, precio, subtotal, total, fecha_carga) VALUES('".$nombre."','".$correo."','".$servicio."','".$cantidad."','".$descripcion."','".$servicio2."','".$cantidad2."','".$descripcion2."','".$servicio3."','".$cantidad3."','".$descripcion3."','".$servicio4."','".$cantidad4."','".$descripcion4."','".$servicio5."','".$cantidad5."','".$descripcion5."','".$precio."','".$subtotal."','".$total."','".$fecha_carga."');";
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Cotizacion ha sido agregado con éxito.";
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