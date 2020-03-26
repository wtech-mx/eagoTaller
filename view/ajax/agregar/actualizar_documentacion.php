<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['cliente'])) {
        $errors[] = "Cliente está vacío.";
    } else if (empty($_POST['documento_code'])){
		$errors[] = "documento está vacío";
	} else if (empty($_POST['vehiculo'])){
		$errors[] = "Vehiculo está vacío";
	}   elseif (
		!empty($_POST['cliente'])
		&& !empty($_POST['documento_code'])
		&& !empty($_POST['vehiculo'])
		
		) {
	
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
		$id_empresa = $_POST['empresa'];
        $vehiculo = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
        $documento_code = mysqli_real_escape_string($con,(strip_tags($_POST["documento_code"],ENT_QUOTES)));
		$id=intval($_POST['id']);
		// update data
        $sql = "UPDATE documentacion SET id_cliente='".$cliente."', id_empresa='".$id_empresa."',documento_code='".$documento_code."', idvehiculo='".$vehiculo."' WHERE id='$id' ";
        $query = mysqli_query($con,$sql);

        // if user has been update successfully
        if ($query) {
            $messages[] = "Los datos han sido procesados exitosamente.";
           print ("<script>window.location='./?view=documentacion';</script>");
        } else {
            $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo. ".mysqli_error($con);
        }
            
		
	} else {
		$errors[] = " Desconocido";	
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