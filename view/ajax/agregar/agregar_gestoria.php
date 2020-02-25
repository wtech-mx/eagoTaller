<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['cliente'])) {
            $errors[] = "Cliente está vacío.";
        }  elseif (empty($_POST['vehiculo'])) {
            $errors[] = "Vehiculo está vacío.";
        } elseif (empty($_POST['datos'])) {
            $errors[] = "Datos está vacío.";
        }  elseif (
        	!empty($_POST['cliente'])
        	&& !empty($_POST['vehiculo'])
        	&& !empty($_POST['datos'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
			
			// escaping, additionally removing everything that could be (html/javascript-) code
            $fecha_ges = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_ges"],ENT_QUOTES)));
            $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
            $vehiculo = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
            $datos = mysqli_real_escape_string($con,(strip_tags($_POST["datos"],ENT_QUOTES)));
           $trasladista = mysqli_real_escape_string($con,(strip_tags($_POST["trasladista"],ENT_QUOTES)));
            $taller = mysqli_real_escape_string($con,(strip_tags($_POST["taller"],ENT_QUOTES)));
            $otro = mysqli_real_escape_string($con,(strip_tags($_POST["otro"],ENT_QUOTES)));
            $aplaca = mysqli_real_escape_string($con,(strip_tags($_POST["aplaca"],ENT_QUOTES)));
            $bplaca = mysqli_real_escape_string($con,(strip_tags($_POST["bplaca"],ENT_QUOTES)));
            $rplaca = mysqli_real_escape_string($con,(strip_tags($_POST["rplaca"],ENT_QUOTES)));
            $tarjeta = mysqli_real_escape_string($con,(strip_tags($_POST["tarjeta"],ENT_QUOTES)));
            $origen = mysqli_real_escape_string($con,(strip_tags($_POST["origen"],ENT_QUOTES)));
			$fecha_carga=date("Y-m-d H:i:s");

			//Write register in to database 
			$sql = "INSERT INTO gestoria (fecha_ges, idcliente, idvehiculo, datos, idtrasladista, idtaller, otro, aplaca, bplaca, rplaca, tarjeta, idcarro, origen, fecha_carga) VALUES('".$fecha_ges."','".$cliente."','".$vehiculo."','".$datos."','".$trasladista."','".$taller."','".$otro."','".$aplaca."','".$bplaca."','".$rplaca."','".$tarjeta."','".$origen."','".$fecha_carga."');";
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "El servicio ha sido agregado con éxito.";
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