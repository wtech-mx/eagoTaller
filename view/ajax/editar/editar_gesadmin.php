<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
	if (empty($_POST['gastos'])) {
            $errors[] = "Gastos está vacío.";
        }  elseif (empty($_POST['mensajeria'])) {
            $errors[] = "Mensajeria está vacío.";
        }   elseif (
        	!empty($_POST['gastos'])
        	&& !empty($_POST['mensajeria'])
        	
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $gastos = mysqli_real_escape_string($con,(strip_tags($_POST["gastos"],ENT_QUOTES)));
        $mensajeria = mysqli_real_escape_string($con,(strip_tags($_POST["mensajeria"],ENT_QUOTES)));
        $general = mysqli_real_escape_string($con,(strip_tags($_POST["general"],ENT_QUOTES)));
        $trasladista_admin = mysqli_real_escape_string($con,(strip_tags($_POST["trasladista_admin"],ENT_QUOTES)));
        $subtotal_admin = mysqli_real_escape_string($con,(strip_tags($_POST["subtotal_admin"],ENT_QUOTES)));
        $eago_admin = mysqli_real_escape_string($con,(strip_tags($_POST["eago_admin"],ENT_QUOTES)));
        $total_admin = mysqli_real_escape_string($con,(strip_tags($_POST["total_admin"],ENT_QUOTES)));
        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE gestoria SET gastos='".$gastos."', mensajeria='".$mensajeria."', general='".$general."', trasladista_admin='".$trasladista_admin."',subtotal_admin='".$subtotal_admin."', eago_admin='".$eago_admin."', total_admin='".$total_admin."' WHERE id='".$id."' ";
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
				<?php
			}
?>			