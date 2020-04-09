<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();
require_once("../../../config/config.php");
 if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="select * from gestoria where id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);

                $idcliente=$rw['id_cliente'];
                $clientes=mysqli_query($con, "select * from cliente where id_cliente=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

                $idcliente=$rw['id_cliente'];
                $clientes=mysqli_query($con, "select * from cliente where id_cliente=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $correo=$cliente_rw['correo'];

                $idempresa=$rw['id_empresa'];
                $empresas=mysqli_query($con, "select * from empresa where id_empresa=$idempresa");
                $empresa_rw=mysqli_fetch_array($empresas);
                $nombre_empresa=$empresa_rw['nombre'];

                $idvehiculo=$rw['idvehiculo'];
                $vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
                $vehiculo_rw=mysqli_fetch_array($vehiculos);
                $patente_vehiculo=$vehiculo_rw['patente'];

                $idtrasladista=$rw['idtrasladista'];
                $trasladistas=mysqli_query($con, "select * from trasladista where id=$idtrasladista");
                $trasladista_rw=mysqli_fetch_array($trasladistas);
                $nombre_trasladista=$trasladista_rw['nombre']." ".$trasladista_rw['apellido'];

                $idtrasladista=$rw['idtrasladista'];
                $trasladistas=mysqli_query($con, "select * from trasladista where id=$idtrasladista");
                $trasladista_rw=mysqli_fetch_array($trasladistas);
                $correo2=$trasladista_rw['correo'];

                $idtaller=$rw['idtaller'];
                $tallers=mysqli_query($con, "select * from taller where id=$idtaller");
                $taller_rw=mysqli_fetch_array($tallers);
                $nombre_taller=$taller_rw['nombre'];

                $datos=$rw['datos'];
                $otro=$rw['otro'];
                $aplaca=$rw['aplaca'];
                $bplaca=$rw['bplaca'];
                $rplaca=$rw['rplaca'];
                $tarjeta=$rw['tarjeta'];
                $origen=$rw['origen'];
                $fecha_ges=$rw['fecha_ges'];
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
        $mail->Port       = 587;                               // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        //Recipients
 
        //Recipients
        $mail->setFrom('adrianwebtech@yahoo.com', 'GOLDBN'); //DESDE DONDE SE VA AENVIAR
        $mail->addAddress('dinopiza@gmail.com');
        $mail->addAddress($correo, ''. $nombre_cliente.';');     // Add a recipient
        $mail->addAddress($correo2);               // Name is optional
        $mail->addReplyTo('contacto_webtech@yahoo.com', 'Information-copia');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //<body style="background-image: linear-gradient(to bottom, #01030c, #030718, #060a21, #070d2b, #061034, #041034, #031135, #011135, #020f2c, #020d23, #020b1a, #020710);">

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Servicio de Gestoria';
        $mail->Body    = '<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Servicio EAGO</title>
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
						<strong>Servicio Gestoria</strong>
					</h1>
					<h3 class="display-6 text-right  text-white" style="color: #ccc">
						<strong>Fecha:</strong>' . $fecha_ges . ';
					</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<blockquote class="blockquote">
						<p class="blockquote-footer text-white" style="color: #ccc">Nombre Cliente:
						'. $nombre_cliente. '
						</p>
						<p class="blockquote-footer text-white" style="color: #ccc">Nombre Empresa:
						'. $nombre_empresa. '
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
									Vehiculo
								</th>
								<th>
									Descripción
								</th>
								<th>
									Trasladista
								</th>
								<th>
									Taller
								</th>
								<th>
									Otros
								</th>
								<th>
									Alta placa
								</th>
								<th>
									Baja placa
								</th>
								<th>
									Reposición placa
								</th>
								<th>
									Reposición tarjeta
								</th>
								<th>
									Recoger en
								</th>
							</tr>
						</thead>

						<tbody>
							<tr>

								<td>
									' . $patente_vehiculo . ' 
								</td>
								<td>
									' . $datos . ' 
								</td>
								<td>
									' . $nombre_trasladista . ' 
								</td>
								<td>
									' . $nombre_taller . ' 
								</td>
								<td>
									' . $otro . ' 
								</td>
								<td>
									' . $aplaca . ' 
								</td>
								<td>
									' . $bplaca . ' 
								</td>
								<td>
									' . $rplaca . ' 
								</td>
								<td>
									' . $tarjeta . ' 
								</td>
								<td>
									' . $origen . ' 
								</td>
							</tr>
						</tbody> 

							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-6">
					 
					<address class="text-white" style="color: #ccc">
						 
						 <p>
						
						<ul style="color: #ccc">
							<li>Atentamente: Dir. Comercial Alejandro</li>
							<li>Email: adiazm@eago.com.mx</li>
							<li>Telefono: 5620453763</li>
						</ul>
						
						  </p><br>
					</address>
				</div>
			</div>
			<div class="contenedor-azul"style="background-color:#1993B8;position: absolute;width: 60%;height:1%;left: 20%;right: 20%;">
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3 class="display-4 text-right" style="color: #1993B8">
						<strong>Para mas información visite</strong>
					</h3>
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