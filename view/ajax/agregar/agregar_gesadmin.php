<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['gestion'])){
			$errors[] = "Gestión está vacío.";
		}  elseif (empty($_POST['gastos'])) {
            $errors[] = "Gastos está vacío.";
        }  elseif (empty($_POST['mensajeria'])) {
            $errors[] = "Mensajeria está vacío.";
        } elseif (empty($_POST['vendedor'])) {
            $errors[] = "Datos está vacío.";
        }  elseif (
        	!empty($_POST['gestion'])
        	&& !empty($_POST['gastos'])
        	&& !empty($_POST['mensajeria'])
        	&& !empty($_POST['vendedor'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
			
			// escaping, additionally removing everything that could be (html/javascript-) code
            $fecha_reg = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_reg"],ENT_QUOTES)));
            $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
            $vehiculo = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
            $placa = mysqli_real_escape_string($con,(strip_tags($_POST["placa"],ENT_QUOTES)));
            $aplaca = mysqli_real_escape_string($con,(strip_tags($_POST["aplaca"],ENT_QUOTES)));
            $gestion = mysqli_real_escape_string($con,(strip_tags($_POST["gestion"],ENT_QUOTES)));
            $gastos = mysqli_real_escape_string($con,(strip_tags($_POST["gastos"],ENT_QUOTES)));
            $mensajeria = mysqli_real_escape_string($con,(strip_tags($_POST["mensajeria"],ENT_QUOTES)));
            $vendedor = mysqli_real_escape_string($con,(strip_tags($_POST["vendedor"],ENT_QUOTES)));
            $general = mysqli_real_escape_string($con,(strip_tags($_POST["general"],ENT_QUOTES)));
            $subtotal = mysqli_real_escape_string($con,(strip_tags($_POST["subtotal"],ENT_QUOTES)));
            $eago = mysqli_real_escape_string($con,(strip_tags($_POST["eago"],ENT_QUOTES)));
            $total = mysqli_real_escape_string($con,(strip_tags($_POST["total"],ENT_QUOTES)));
			$fecha_carga=date("Y-m-d H:i:s");

			//Write register in to database 
			$sql = "INSERT INTO gestoria (idfecha_reg, idcliente, idvehiculo, idplaca, idaplaca, gestion, gasolina, gestion, gastos, mensajeria, vendedor, general, subtotal, eago, total, fecha_carga) VALUES('".$fecha_reg."','".$cliente."','".$vehiculo."','".$placa."','".$aplaca."','".$gestion."','".$gestion."','".$gastos."','".$mensajeria."','".$vendedor."','".$general."','".$subtotal."','".$eago."','".$total."','".$fecha_carga."');";
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
				<?php
			}
?>			