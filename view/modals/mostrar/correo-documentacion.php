<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();
require_once("../../../config/config.php");
 if (isset($_GET["id"])){
		$id_documento=$_GET["id"];
		$id_documento=intval($id_documento);
		$sql="select * from documentacion where id='$id_documento'";
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

				$foto1=$rw['foto1'];
				$foto2=$rw['foto2'];
				$foto3=$rw['foto3'];
				$foto4=$rw['foto4'];
				$foto5=$rw['foto5'];
				$foto6=$rw['foto6'];
				$foto7=$rw['foto7'];
				$foto8=$rw['foto8'];
				$foto9=$rw['foto9'];
				$foto10=$rw['foto10'];
				$fecha_carga=$rw['fecha_carga'];
		}
    date_default_timezone_set("America/Mexico_City");

    $imgfondo = "https://eago.com.mx/eago-newpag/vistas/img/fondo.png";
    $rutaImg = "https://localhost/eagoTaller/";
    $rutaServ = "https://eago.com.mx/eagoTaller/";
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'a2plcpnl0023.prod.iad2.secureserver.net';                    // Set the SMTP server to send through

        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication ACCESO A CUENTA
        $mail->Username   = 'contacto@eago.com.mx';                     // SMTP username ACCESO A CUENTA
        $mail->Password   = 'Eago123.';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('contacto@eago.com.mx', 'EAGO'); //DESDE DONDE SE VA AENVIAR
        $mail->addAddress('dinopiza@gmail.com');
        $mail->addAddress($correo, ''. $nombre_cliente.';');     // Add a recipient
        $mail->addReplyTo('contacto_webtech@yahoo.com', 'Information-copia');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //<body style="background-image: linear-gradient(to bottom, #01030c, #030718, #060a21, #070d2b, #061034, #041034, #031135, #011135, #020f2c, #020d23, #020b1a, #020710);">

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'EAGO Documentacion';
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
						<strong>EAGO Documentacion</strong>
					</h1>
					<h3 class="display-6 text-right  text-white" style="color: #ccc">
						<strong>Fecha:</strong>' . $fecha_carga . ';
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
								<th >
									foto 1
								</th>
								<th >
									foto 2
								</th>
								<th >
									foto 3
								</th>
								<th >
									foto 4
								</th>
								<th >
									foto 5
								</th>
								<th >
									foto 6
								</th>
								<th >
									foto 7
								</th>
								<th >
									foto 8
								</th>
								<th >
									foto 9
								</th>
								<th >
									foto 10
								</th>
							</tr>
						</thead>

						<tbody>
							<tr>

								<td>
									' . $patente_vehiculo . ' 
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto1 . '" alt="'. $rutaServ .'' . $foto1 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto2 . '" alt="'. $rutaServ .'' . $foto2 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto3 . '" alt="'. $rutaServ .'' . $foto3 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto4 . '" alt="'. $rutaServ .'' . $foto4 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto5 . '" alt="'. $rutaServ .'' . $foto5 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto6 . '" alt="'. $rutaServ .'' . $foto6 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto7 . '" alt="'. $rutaServ .'' . $foto7 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto8 . '" alt="'. $rutaServ .'' . $foto8 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto9 . '" alt="'. $rutaServ .'' . $foto9 . '">
								</td>
								<td>
								<img src="'. $rutaServ.'' . $foto10 . '" alt="'. $rutaServ .'' . $foto10 . '">
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
</script>
<?php
}
?>