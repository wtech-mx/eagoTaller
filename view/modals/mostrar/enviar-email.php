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
        $mail->Host       = 'a2plcpnl0023.prod.iad2.secureserver.net';                    // Set the SMTP server to send through

        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication ACCESO A CUENTA
        $mail->Username   = 'contacto@eago.com.mx';                     // SMTP username ACCESO A CUENTA
        $mail->Password   = 'Eago123.';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('contacto@eago.com.mx', 'EAGO'); //DESDE DONDE SE VA AENVIAR
        $mail->addAddress('aldiazm.11@gmail.com', 'Ale');     // Add a recipient
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
        $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<!--[if !mso]><!-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<![endif]-->
	<title></title>
	<!--[if !mso]><!-->
	<!--<![endif]-->
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
	<style type="text/css" id="media-query">
		@media (max-width: 820px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #041039;">
	<!--[if IE]><div class="ie-browser"><![endif]-->
	<table class="nl-container" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #041039; width: 100%;" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#041039" valign="top">
		<tbody>
			<tr style="vertical-align: top;" valign="top">
				<td style="word-break: break-word; vertical-align: top;" valign="top">
					<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#041039"><![endif]-->
					<div style="background-color:transparent;">
						<div class="block-grid mixed-two-up" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="266" style="background-color:transparent;width:266px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 264px; width: 266px;">
									<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<div class="img-container center autowidth" align="center" style="padding-right: 0px;padding-left: 0px;">
												<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img class="center autowidth" align="center" border="0" src="https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/533119_514055/LOGO-AGO-BLANCO-6.png" alt="Image" title="Image" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 80%; max-width: 212px; display: block;" width="212">
												<!--[if mso]></td></tr></table><![endif]-->
											</div>
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td><td align="center" width="533" style="background-color:transparent;width:533px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num8" style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 528px; width: 533px;">
									<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
											<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div style="line-height: 1.2; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; color: #555555; mso-line-height-alt: 14px;">
													<p style="font-size: 50px; line-height: 1.2; word-break: break-word; text-align: right; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 60px; margin: 0;"><span style="color: #00ccff; font-size: 30px;">COTIZACION</span></p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
											<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div style="line-height: 1.2; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; color: #555555; mso-line-height-alt: 14px;">
													<p style="font-size: 20px; line-height: 1.2; word-break: break-word; text-align: right; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 24px; margin: 0;"><span style="color: #ffffff; font-size: 20px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; FECHA:&nbsp;' . $fecha_carga . ';</span></p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid mixed-two-up" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="266" style="background-color:transparent;width:266px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 264px; width: 266px;">
									<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
											<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="font-size: 30px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 36px; margin: 0;"><span style="color: #00ccff; font-size: 30px;">'. $nombre. '</span></p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
											<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
													<p style="font-size: 16px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 19px; margin: 0;"><span style="color: #fff; font-size: 16px;">&nbsp;' . $mensaje . '</span></p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td><td align="center" width="533" style="background-color:transparent;width:533px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num8" style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 528px; width: 533px;">
									<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<div></div>
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid " style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="800" style="background-color:transparent;width:800px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 800px; display: table-cell; vertical-align: top; width: 800px;">
									<div style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;padding: 10px;">
											<!--<![endif]-->
											<div style="font-size:8px;text-align:center;padding: 5PX;font-family:Arial, Helvetica Neue, Helvetica, sans-serif">
												<div class="row mt-5">
  													<div class=" col-md-12">
													<table class="table text-white tabla-completa" style="color: #ccc;width: 100%;padding: 30px;">
														<thead class="tabla-azul" style="padding: 100px;">
															<tr class="tr" style="background-color: #1993B8;height: 40px;">
																<th>
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

														<tbody style="text-align: center;font-size: 120%;">
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
													</div>
													<!--[if (!mso)&(!IE)]><!-->
													</div>
													<!--<![endif]-->
													</div>
													</div>
	<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
	<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
	</div>
	</div>
	</div>
	<div style="background-color:transparent;">
		<div class="block-grid two-up" style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
			<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
				<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
				<!--[if (mso)|(IE)]><td align="center" width="400" style="background-color:transparent;width:400px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->

				<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				<!--[if (mso)|(IE)]></td><td align="center" width="400" style="background-color:transparent;width:400px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->

				<div class="col num6" style="min-width: 320px; max-width: 400px; display: table-cell; vertical-align: top; width: 400px;">
					<div style="width:100% !important;">
						<!--[if (!mso)&(!IE)]><!-->
						<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
							<!--<![endif]-->
							<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
							<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
								<div style="line-height: 1.2; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; color: #555555; mso-line-height-alt: 14px;">
									<p style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: right; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 19px; margin: 0;"><span style="color: #ffffff;">SUBTOTAL: $'.$subtotal.' </span></p>
								</div>
							</div>
							<!--[if mso]></td></tr></table><![endif]-->
							<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
							<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
								<div style="line-height: 1.2; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; color: #555555; mso-line-height-alt: 14px;">
									<p style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: right; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 19px; margin: 0;"><span style="color: #ffffff;">TOTAL: $'.$total.'</span></p>
								</div>
							</div>
							<!--[if mso]></td></tr></table><![endif]-->
							<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
							<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
								<div style="line-height: 1.2; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; color: #555555; mso-line-height-alt: 14px;">
									<p style="font-size: 30px; line-height: 1.2; word-break: break-word; text-align: right; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 36px; margin: 0;"><span style="color: #00ccff; font-size: 30px;">GRACIAS</span></p>
								</div>
							</div>
							<!--[if mso]></td></tr></table><![endif]-->
							<!--[if (!mso)&(!IE)]><!-->
						</div>
						<!--<![endif]-->
					</div>
				</div>
				<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
			</div>
				<div class="col num6" style="min-width: 320px; max-width: 400px; display: table-cell; vertical-align: top; width: 400px;">
					<div style="width:100% !important;">
						<!--[if (!mso)&(!IE)]><!-->
						<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
							<!--<![endif]-->
							<div style="font-size:16px;text-align:center;font-family:Arial, Helvetica Neue, Helvetica, sans-serif">
								<div class="col-md-6">
									<address class="text-white datos-contacto" style="color: #FFF;font-size: 20px;text-decoration: none;">
										<p>
											<ul style="color: #ccc"><strong>Nota: estos precios no Incluyen IVA</strong>
												<li>Atentamente: Dir. Comercial Alejandro</li>
												<li>Email: <a style="text-decoration: none;color:#fff" href="mailto:adiazm@eago.com.mx?subject=cotizacion" "email me">adiazm@eago.com.mx</a></li>
												<li>Telefono:<a style="text-decoration: none;color:#fff" href="tel:56 20453763" title="">5620453763</a></li>
											</ul>
										</p><br>
									</address>
								</div>
							</div>
							<!--[if (!mso)&(!IE)]><!-->
						</div>
						<!--<![endif]-->
					</div>
				</div>		</div>

	</div>

	<div style="background-color:transparent;">
		<div class="block-grid " style="Margin: 0 auto; min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
			<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
				<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:800px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
				<!--[if (mso)|(IE)]><td align="center" width="800" style="background-color:transparent;width:800px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
				<div class="col num12" style="min-width: 320px; max-width: 800px; display: table-cell; vertical-align: top; width: 800px;">
					<div style="width:100% !important;">
						<!--[if (!mso)&(!IE)]><!-->
						<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
							<!--<![endif]-->
							<div class="button-container" align="center" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
								<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="www.eago.com.m" style="height:31.5pt; width:160.5pt; v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="#3AAEE0"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
									<a href="www.eago.com.mx" target="blank" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #3AAEE0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; width: auto; border-top: 1px solid #3AAEE0; border-right: 1px solid #3AAEE0; border-bottom: 1px solid #3AAEE0; border-left: 1px solid #3AAEE0; padding-top: 5px; padding-bottom: 5px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">www.eago.com.mx</span></span></a>
								<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
							</div>
							<!--[if (!mso)&(!IE)]><!-->
						</div>
						<!--<![endif]-->
					</div>
				</div>
				<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
			</div>
		</div>
	</div>
	<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
	</td>
	</tr>
	</tbody>
	</table>
	<!--[if (IE)]></div><![endif]-->
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