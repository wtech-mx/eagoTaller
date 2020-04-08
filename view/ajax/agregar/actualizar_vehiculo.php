<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['vehiculo_code'])){
		$errors[] = "Código del vehiculo está vacío";
	}else if (empty($_POST['patente'])){
		$errors[] = "Patente del vehiculo está vacío";
	} else if (empty($_POST['marca'])){
		$errors[] = "Marca está vacío";
	} else if (empty($_POST['modelo'])){
		$errors[] = "Modelo está vacío";
	} elseif (
		!empty($_POST['vehiculo_code'])
		&& !empty($_POST['patente'])
		&& !empty($_POST['marca'])
		&& !empty($_POST['modelo'])
		) {
	
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
        $vehiculo_code = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo_code"],ENT_QUOTES)));
		$patente = mysqli_real_escape_string($con,(strip_tags($_POST["patente"],ENT_QUOTES)));
		$placa = mysqli_real_escape_string($con,(strip_tags($_POST["placa"],ENT_QUOTES)));
		$marca= mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
		$submarca= mysqli_real_escape_string($con,(strip_tags($_POST["submarca"],ENT_QUOTES)));
		$empresa = mysqli_real_escape_string($con,(strip_tags($_POST["empresa"],ENT_QUOTES)));
		$modelo= mysqli_real_escape_string($con,$_POST["modelo"]);
		$chasis= mysqli_real_escape_string($con,(strip_tags($_POST["chasis"],ENT_QUOTES)));
		$motor= mysqli_real_escape_string($con,(strip_tags($_POST["motor"],ENT_QUOTES)));
		$vto_vtv= mysqli_real_escape_string($con,(strip_tags($_POST["vto_vtv"],ENT_QUOTES)));
		$seguro= mysqli_real_escape_string($con,(strip_tags($_POST["seguro"],ENT_QUOTES)));
		$poliza= mysqli_real_escape_string($con,(strip_tags($_POST["poliza"],ENT_QUOTES)));
		$vencimiento= mysqli_real_escape_string($con,(strip_tags($_POST["vencimiento"],ENT_QUOTES)));
		$estado= mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
		$color= mysqli_real_escape_string($con,(strip_tags($_POST["color"],ENT_QUOTES)));
		$id=intval($_POST['id']);
			
		// update data
        $sql = "UPDATE vehiculo SET id_cliente='".$cliente."', id_empresa='".$empresa."',vehiculo_code='".$vehiculo_code."', patente='".$patente."', placa='".$placa."', marca='".$marca."', submarca='".$submarca."', modelo='".$modelo."', nro_chasis='".$chasis."',nro_motor='".$motor."', vto_vtv='".$vto_vtv."', seguro='".$seguro."', poliza='".$poliza."', vencimiento='".$vencimiento."', estado='".$estado."', color='".$color."' WHERE id='$id' ";
        $query = mysqli_query($con,$sql);

        // if user has been update successfully
        if ($query) {
            $messages[] = "Los datos han sido procesados exitosamente.";
			print ("<script>window.location='./?view=vehiculos';</script>");

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

			<script type="text/javascript">
			        $("#actualizar_datos").val("");
			swal("¡Bien!", " <?php echo $message;?> ", "success");
			</script>
			<?php
		}
?>			