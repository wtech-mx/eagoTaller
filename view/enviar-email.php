<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

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
    $mail->Password   = 'Ytumamatambien16486';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('adrianwebtech@yahoo.com', 'GOLDBN');//DESDE DONDE SE VA AENVIAR
    $mail->addAddress('dinopiza@gmail.com', 'Ale');     // Add a recipient
    $mail->addAddress('dinopiza@yahoo.com.mx');               // Name is optional
    $mail->addReplyTo('contacto_webtech@yahoo.com', 'Information-copia');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//<body style="background-image: linear-gradient(to bottom, #01030c, #030718, #060a21, #070d2b, #061034, #041034, #031135, #011135, #020f2c, #020d23, #020b1a, #020710);">

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto';
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
		

		<body style="background-image: url( '. $imgfondo .' );">



		    <div class="container">
			<div class="row">
				<div class="col-md-4 mt-5">
					<img alt="Bootstrap Image Preview" src="https://eago.com.mx/eago-newpag/vistas/img/LOGO-AGO-BLANCO-6.png">
				</div>
				<div class="col-md-8 mt-5">
					<h1 class="display-3 text-right" style="color: #1993B8">
						<strong>COTIZACIÓN</strong>
					</h1>
					<h3 class="display-6 text-right  text-white" style="color: #ccc">
						<strong>FECHA:</strong> MARZO 26, 2020
					</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<blockquote class="blockquote">
						<p class="mb-0 display-4" style="color: #1993B8">
							<strong>Destinatario</strong>
						</p>
						<p class="blockquote-footer text-white" style="color: #ccc">
							'. $mensaje .'
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
								<th>
									#
								</th>
								<th >
									SERVICIO
								</th>
								<th>
									TRAMITE
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
									1
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									01/04/2012
								</td>
								<td>
									Default
								</td>
								<td>
									03/04/2012
								</td>
								<td>
									Pending
								</td>
							</tr>
							<tr class="bg-light " style="color: #ccc">
								<td>
									1
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									01/04/2012
								</td>
								<td>
									Approved
								</td>
								<td>
									03/04/2012
								</td>
								<td>
									Pending
								</td>

							</tr>
							<tr class="">
								<td>
									2
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									02/04/2012
								</td>
								<td>
									Declined
								</td>
								<td>
									Pending
								</td>
								<td>
									Pending
								</td>
							</tr>
							<tr class="bg-light " style="color: #ccc">
								<td>
									3
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									03/04/2012
								</td>
								<td>
									Pending
								</td>
								<td>
									03/04/2012
								</td>
								<td>
									Pending
								</td>
							</tr>
							<tr class="">
								<td>
									4
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									04/04/2012
								</td>
								<td>
									Call in to confirm
								</td>
								<td>
									04/04/2012
								</td>
								<td>
									Call in to confirm
								</td>
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
						 <strong class="p-4">Subtotal</strong>$1750
						 <strong class="p-4">TOTAL</strong>$1750			
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

    $mail->send();

    echo '<script>
			alert("Mensaje enviado correctamente");

    	</script>';
    	header ("Location: https://localhost/Eago-backend/?view=cotizacion");

	} catch (Exception $e) {
	    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
	}

