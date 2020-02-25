<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
	if (empty($_POST['gasolina'])) {
            $errors[] = "Gasolina está vacío.";
        }  elseif (
        	!empty($_POST['gasolina'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $gasolina = mysqli_real_escape_string($con,(strip_tags($_POST["gasolina"],ENT_QUOTES)));
        $otro_admin = mysqli_real_escape_string($con,(strip_tags($_POST["otro_admin"],ENT_QUOTES)));
        $trasladista_admin = mysqli_real_escape_string($con,(strip_tags($_POST["trasladista_admin"],ENT_QUOTES)));
        $subtotal = mysqli_real_escape_string($con,(strip_tags($_POST["subtotal"],ENT_QUOTES)));
        $eago = mysqli_real_escape_string($con,(strip_tags($_POST["eago"],ENT_QUOTES)));
        $total = mysqli_real_escape_string($con,(strip_tags($_POST["total"],ENT_QUOTES)));
        $estado= mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE mantenimiento SET gasolina='".$gasolina."', otro_admin='".$otro_admin."', trasladista_admin='".$trasladista_admin."', subtotal='".$subtotal."', eago='".$eago."', total='".$total."', estado='".$estado."' WHERE id='".$id."' ";
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