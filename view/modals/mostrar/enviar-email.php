<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();
require_once("../../../config/config.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $id = intval($id);
    $sql = "SELECT * FROM cotizacion WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    $num = mysqli_num_rows($query);
    if ($num == 1) {

        $rw = mysqli_fetch_array($query);
        $fecha_carga = $rw['fecha_carga'];
        $nombre = $rw['nombre'];
        $correo = $rw['correo'];
        $mensaje = $rw['mensaje'];

        $cantidad = $rw['cantidad'];
        $descripcion = $rw['descripcion'];
        $precio = $rw['precio'];

        $cantidad2 = $rw['cantidad2'];
        $descripcion2 = $rw['descripcion2'];
        $precio2 = $rw['precio2'];

        $cantidad3 = $rw['cantidad3'];
        $descripcion3 = $rw['descripcion3'];
        $precio3 = $rw['precio3'];

        $cantidad3 = $rw['cantidad3'];
        $descripcion3 = $rw['descripcion3'];
        $precio3 = $rw['precio3'];

        $cantidad4 = $rw['cantidad4'];
        $descripcion4 = $rw['descripcion4'];
        $precio4 = $rw['precio4'];

        $cantidad5 = $rw['cantidad5'];
        $descripcion5 = $rw['descripcion5'];
        $precio5 = $rw['precio5'];

        $subtotal = $rw['subtotal'];
        $total = $rw['total'];

        $entidad = $rw['entidad'];
        $entidads = mysqli_query($con, "select * from estados where id=$entidad");
        $entidad_rw = mysqli_fetch_array($entidads);
        $nombre_entidad = $entidad_rw['nombre'];
        $servicio = $rw['servicio'];
        $servicios = mysqli_query($con, "select * from servicios where id=$servicio");
        $servicio_rw = mysqli_fetch_array($servicios);
        $nombre_servicio = $servicio_rw['nombre'];

        $entidad2 = $rw['entidad2'];
        $entidad2s = mysqli_query($con, "select * from estados where id=$entidad2");
        $entidad2_rw = mysqli_fetch_array($entidad2s);
        $nombre_entidad2 = $entidad2_rw['nombre'];
        $servicio2 = $rw['servicio2'];
        $servicio2s = mysqli_query($con, "select * from servicios where id=$servicio2");
        $servicio2_rw = mysqli_fetch_array($servicio2s);
        $nombre_servicio2 = $servicio2_rw['nombre'];

        $entidad3 = $rw['entidad3'];
        $entidad3s = mysqli_query($con, "select * from estados where id=$entidad3");
        $entidad3_rw = mysqli_fetch_array($entidad3s);
        $nombre_entidad3 = $entidad3_rw['nombre'];
        $servicio3 = $rw['servicio3'];
        $servicio3s = mysqli_query($con, "select * from servicios where id=$servicio3");
        $servicio3_rw = mysqli_fetch_array($servicio3s);
        $nombre_servicio3 = $servicio3_rw['nombre'];

        $entidad4 = $rw['entidad4'];
        $entidad4s = mysqli_query($con, "select * from estados where id=$entidad4");
        $entidad4_rw = mysqli_fetch_array($entidad4s);
        $nombre_entidad4 = $entidad4_rw['nombre'];
        $servicio4 = $rw['servicio4'];
        $servicio4s = mysqli_query($con, "select * from servicios where id=$servicio4");
        $servicio4_rw = mysqli_fetch_array($servicio4s);
        $nombre_servicio4 = $servicio4_rw['nombre'];

        $entidad5 = $rw['entidad5'];
        $entidad5s = mysqli_query($con, "select * from estados where id=$entidad5");
        $entidad5_rw = mysqli_fetch_array($entidad5s);
        $nombre_entidad5 = $entidad5_rw['nombre'];
        $servicio5 = $rw['servicio5'];
        $servicio5s = mysqli_query($con, "select * from servicios where id=$servicio5");
        $servicio5_rw = mysqli_fetch_array($servicio5s);
        $nombre_servicio5 = $servicio5_rw['nombre'];
    }

    date_default_timezone_set("America/Mexico_City");

    $imgfondo = "https://eago.com.mx/eago-newpag/vistas/img/fondo.png";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through

        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication ACCESO A CUENTA
        $mail->Username   = 'dinopiza@gmail.com';                     // SMTP username ACCESO A CUENTA
        $mail->Password   = 'Ytumamatambien16486&';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('adrianwebtech@yahoo.com', 'GOLDBN'); //DESDE DONDE SE VA AENVIAR
        $mail->addAddress('dinopiza@gmail.com', 'Ale');     // Add a recipient
        $mail->addAddress($correo);               // Name is optional
        $mail->addReplyTo('contacto_webtech@yahoo.com', 'Information-copia');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //<body style="background-image: linear-gradient(to bottom, #01030c, #030718, #060a21, #070d2b, #061034, #041034, #031135, #011135, #020f2c, #020d23, #020b1a, #020710);">

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '' . $mensaje . ';';
        $mail->Body    = '<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>COTIZACION EAGO</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		</head>

		<style type="text/css" media="screen">
			
		</style>
		

		<body style="background-image: url( ' . $imgfondo . ' );">

		    <div class="container">
			<div class="row">
				<div class="col-md-4 mt-5">
					<img alt="Bootstrap Image Preview" src="https://eago.com.mx/eago-newpag/vistas/img/LOGO-AGO-BLANCO-6.png" width="30%">
				</div>
				<div class="col-md-8 mt-5">
					<h1 class="display-3 text-right" style="color: #1993B8">
						<strong>Cotizacion</strong>
					</h1>
					<h3 class="display-6 text-right  text-white" style="color: #ccc">
						<strong>FECHA:</strong>' . $fecha_carga . ';
					</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<blockquote class="blockquote">
						<p class="mb-0 display-4" style="color: #1993B8">
							<strong>' . $mensaje . ' </strong>
						</p>
						<p class="blockquote-footer text-white" style="color: #ccc">
						'. $nombre. '
						</p>
					</blockquote>
				</div>
				<div class="col-md-9">
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-12">
					<table class="table text-white" style="color: #ccc">
						<thead>
							<tr style="background-color: #1993B8">

								<th >
									SERVICIO
								</th>
								<th>
									Descripcion
								</th>
								<th>
									ENTIDAD
								</th>
								<th>
									CANTIDAD
								</th>
								<th>
									PRECIO
								</th>
							</tr>
						</thead>

						<tbody>
							<tr>

								<td>
									' . $nombre_servicio . ' 
								</td>
								<td>
									' . $descripcion . ' 
								</td>
								<td>
									' . $nombre_entidad . ' 
								</td>
								<td>
									' . $cantidad . ' 
								</td>
								<td>
									$' . $precio . ' 
								</td>
							</tr>
							<tr>

								<td>
									' . $nombre_servicio2 . ' 
								</td>
								<td>
									' . $descripcion2 . ' 
								</td>
								<td>
									' . $nombre_entidad2 . ' 
								</td>
								<td>
									' . $cantidad2 . ' 
								</td>
								<td>
									$' . $precio2 . ' 
								</td>
							</tr>
							
							<tr>

								<td>
									' . $nombre_servicio3 . ' 
								</td>
								<td>
									' . $descripcion3 . ' 
								</td>
								<td>
									' . $nombre_entidad3 . ' 
								</td>
								<td>
									' . $cantidad3 . ' 
								</td>
								<td>
									$' . $precio3 . ' 
								</td>
							</tr>
							<tr>

								<td>
									' . $nombre_servicio4 . ' 
								</td>
								<td>
									' . $descripcion4 . ' 
								</td>
								<td>
									' . $nombre_entidad4 . ' 
								</td>
								<td>
									' . $cantidad4 . ' 
								</td>
								<td>
									$' . $precio4 . ' 
								</td>
							</tr>
							<tr>
								<td>
							<tbody>
							<tr>

								<td>
									' . $nombre_servicio5 . ' 
								</td>
								<td>
									' . $descripcion5 . ' 
								</td>
								<td>
									' . $nombre_entidad5 . ' 
								</td>
								<td>
									' . $cantidad5 . ' 
								</td>
								<td>
									$' . $precio5 . ' 
								</td>
							</tr>
						</tbody> 

							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9">
				</div>
				<div class="col-md-3">
					 
					<address class="text-white" style="color: #ccc">
						 <strong class="p-4">Subtotal </strong>$'.$total.' <br>
						 <strong class="p-4">TOTAL </strong>$'.$subtotal.' <br>	 	
					</address>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-6">
					 
					<address class="text-white" style="color: #ccc">
						 
						 <p>
						
						<ul style="color: #ccc"><strong>Nota: estos precios no Incluyen IVA</strong>
							<li>Atentamente: Dir. Comercial Alejandro</li>
							<li>Email: adiazm@eago.com.mx</li>
							<li>Telefono: 5620453763</li>
						</ul>
						
						  </p><br>
					</address>
				</div>
				<div class="col-md-6">
					<h3 class="display-4 text-right" style="color: #1993B8">
						<strong>GRACIAS!</strong>
					</h3>
				</div>
			</div>
			<div class="contenedor-azul"style="background-color:#1993B8;position: absolute;width: 60%;height:1%;left: 20%;right: 20%;">
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center text-white" style="color: #ccc">
						<a  class="text-center text-white" href="www.eago.com.mx/" target="blank" title="pagina eago">www.eago.com.mx
						</a>
					</h3>
				</div>
			</div>
		</div>
			
		</body>


		</html>';

    // if has been added successfully
    if ($mail->send()) {
        $messages[] = "correo  ha sido enviado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el correo falló. Por favor, regrese y vuelva a intentarlo.";
    }
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }
    
    } else {
        $errors[] = "desconocido.";
    }

if (isset($errors)) {

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
if (isset($messages)) {
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
        swal("¡Bien!", " <?php echo $message; ?> ", "success");
    </script>
<?php
}
?>