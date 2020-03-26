<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
	if (empty($_POST['fecha_rep'])){
			$errors[] = "Fecha de servicio está vacío.";
		}  elseif (empty($_POST['cliente'])) {
            $errors[] = "cliente está vacío.";
        }	elseif (empty($_POST['vehiculo'])) {
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
        $id_empresa = $_POST['empresa'];
        $datos = mysqli_real_escape_string($con,(strip_tags($_POST["datos"],ENT_QUOTES)));
        $trasladista = mysqli_real_escape_string($con,(strip_tags($_POST["trasladista"],ENT_QUOTES)));
        $taller = mysqli_real_escape_string($con,(strip_tags($_POST["taller"],ENT_QUOTES)));
        $otros = mysqli_real_escape_string($con,(strip_tags($_POST["otros"],ENT_QUOTES)));
        $vendedor = mysqli_real_escape_string($con,(strip_tags($_POST["vendedor"],ENT_QUOTES)));
        $origen = mysqli_real_escape_string($con,(strip_tags($_POST["origen"],ENT_QUOTES)));
        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE estetica SET fecha_rep='".$fecha_rep."', id_cliente='".$cliente."', id_empresa='".$id_empresa."', idvehiculo='".$vehiculo."' datos='".$datos."', idtrasladista='".$trasladista."', idtaller='".$taller."', otros='".$otros."', vendedor='".$vendedor."', origen='".$origen."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El servicio ha sido actualizado con éxito.";
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