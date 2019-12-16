<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['fecha_rep'])){
			$errors[] = "Fecha de servicio está vacío.";
		}  elseif (empty($_POST['cliente'])) {
            $errors[] = "Cliente está vacío.";
        }  elseif (empty($_POST['vehiculo'])) {
            $errors[] = "Vehiculo está vacío.";
        } elseif (empty($_POST['datos'])) {
            $errors[] = "Datos está vacío.";
        }  elseif (
        	!empty($_POST['fecha_rep'])
        	&& !empty($_POST['cliente'])
        	&& !empty($_POST['vehiculo'])
        	&& !empty($_POST['datos'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
			
			// escaping, additionally removing everything that could be (html/javascript-) code
            $fecha_rep = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_rep"],ENT_QUOTES)));
            $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
            $vehiculo = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
            $datos = mysqli_real_escape_string($con,(strip_tags($_POST["datos"],ENT_QUOTES)));
            $trasladistas = mysqli_real_escape_string($con,(strip_tags($_POST["trasladistas"],ENT_QUOTES)));
            $gasolina = mysqli_real_escape_string($con,(strip_tags($_POST["gasolina"],ENT_QUOTES)));
            $otros = mysqli_real_escape_string($con,(strip_tags($_POST["otros"],ENT_QUOTES)));
            $vendedor = mysqli_real_escape_string($con,(strip_tags($_POST["vendedor"],ENT_QUOTES)));
            $subtotal = mysqli_real_escape_string($con,(strip_tags($_POST["subtotal"],ENT_QUOTES)));
            $eago = mysqli_real_escape_string($con,(strip_tags($_POST["eago"],ENT_QUOTES)));
            $total = mysqli_real_escape_string($con,(strip_tags($_POST["total"],ENT_QUOTES)));
			$fecha_carga=date("Y-m-d H:i:s");

			//Write register in to database 
			$sql = "INSERT INTO estetica (fecha_rep, idcliente, idvehiculo, datos, trasladistas, gasolina, otros, vendedor, subtotal, eago, total, fecha_carga) VALUES('".$fecha_rep."','".$cliente."','".$vehiculo."','".$datos."','".$trasladistas."','".$gasolina."','".$otros."','".$vendedor."','".$subtotal."','".$eago."','".$total."','".$fecha_carga."');";
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Verificación ha sido agregado con éxito.";
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
				<?php
			}
?>			