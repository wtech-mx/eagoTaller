<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['nombre'])){
		$errors[] = "nombre está vacío";
	}else if (empty($_POST['apellido'])){
		$errors[] = "apellido está vacío";
	} else if (empty($_POST['vehiculo'])){
		$errors[] = "Vehiculo está vacío";
	} else if (empty($_POST['documento'])){
		$errors[] = "documento está vacío";
	}   elseif (
		!empty($_POST['nombre'])
		&& !empty($_POST['apellido'])
		&& !empty($_POST['vehiculo'])
		&& !empty($_POST['documento'])
		) {
	
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
        $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$vehiculo= mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
		$documento= mysqli_real_escape_string($con,$_POST["documento"]);
		$facturaO= mysqli_real_escape_string($con,(strip_tags($_POST["facturaO"],ENT_QUOTES)));
		$factura1= mysqli_real_escape_string($con,(strip_tags($_POST["factura1"],ENT_QUOTES)));
		$factura2= mysqli_real_escape_string($con,(strip_tags($_POST["factura2"],ENT_QUOTES)));
		$factura3= mysqli_real_escape_string($con,(strip_tags($_POST["factura3"],ENT_QUOTES)));
		$tenencia= mysqli_real_escape_string($con,(strip_tags($_POST["tenencia"],ENT_QUOTES)));
		
		//Write register in to database 
			$sql = "INSERT INTO documentacion (nombre, apellido, vehiculo, documento, facturaO, factura1, factura2, factura3, tenencia) VALUES('".$nombre."','".$apellido."','".$vehiculo."','".$documento."','".$facturaO."','".$factura1."','".$factura2."','".$factura3."','".$tenencia."');";
			$query_new = mysqli_query($con,$sql);
            // si se ha agregado con éxito
            if ($query_new) {

            		$numeroMaximo="select max(id) as nuevo_documentacion from documentacion";
            		$idusernew_sql=mysqli_query($con,$numeroMaximo);
            		$idusernew_rw=mysqli_fetch_array($idusernew_sql);
            		$idusernew=$idusernew_rw['nuevo_documentacion'];	
            		//agrego los permisos by amner saucedo sosa
            		$num_element=0;
					$sw=true;

                $messages[] = "Documentación ha sido agregado con éxito.";
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