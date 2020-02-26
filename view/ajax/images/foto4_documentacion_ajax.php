<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../../config/config.php");

	$id=intval($_REQUEST['id']);
	$target_dir="../../resources/images/documentos/";
	$image_name = time()."_".basename($_FILES["imagefile4"]["name"]);
	$target_file = $target_dir .$image_name ;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$imageFileZise=$_FILES["imagefile4"]["size"];

	/* Inicio Validacion*/
	// Allow certain file formats
	if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "gif" ) and $imageFileZise>0) {
	$errors[]= "<p>Lo sentimos, sólo se permiten archivos JPG , JPEG, PNG, PDF y GIF.</p>";
	} else if ($imageFileZise > 10000000) {//1048576 byte=1MB
	$errors[]= "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona logo de menos de 10MB</p>";
	} else if (empty($id)){
		$errors[]= "<p>ID del factura 2 está vacío.</p>";
	} else{
		/* Fin Validacion*/
		if ($imageFileZise>0){
		move_uploaded_file($_FILES["imagefile4"]["tmp_name"], $target_file);
		$imagen=basename($_FILES["imagefile4"]["name"]);
		$img_update="foto4='view/resources/images/documentos/$image_name' ";

		}else { $img_update="";}
		    $sql = "UPDATE documentacion SET $img_update WHERE id='$id';";
		    $query_new_insert = mysqli_query($con,$sql);

    if ($query_new_insert) {
?>
		
		<a href="" class="img-responsive" alt="Imagen del factura 1" data-toggle="modal" data-target="#myModal" style="cursor:pointer;padding: 10px;background: #2ECC71;overflow-y: hidden;overflow-x: hidden;">
			<img class="img-responsive" src="" alt="">
				<embed class="pdf-img" type="application/pdf" src="view/resources/images/documentos/<?php echo $image_name;?>"style="cursor:pointer;display: block;max-width: 100%;height: auto;overflow-y: hidden;overflow-x: hidden;"></embed>
			</img>
		</a>

		<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
				<div class="modal-content">
			 		<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">&nbsp;</h4>
			  		</div>
					<div class="modal-body">
						<embed type="application/pdf"  src="view/resources/images/documentos/<?php echo $image_name;?>" style="width: 100%;height: 500px"></embed>
					</div>
				</div>
		  	</div>
		</div>
		
	<?php
	    } else {
	        $errors[] = "Lo sentimos, actualización falló. Intente nuevamente. ".mysqli_error($con);
	    }
	}			
	?>
<?php 
	if (isset($errors)){
?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error! </strong>
		<?php
		foreach ($errors as $error){
				echo $error;
			}
		?>
	</div>	
<?php
	}
?>
<?php 
	if (isset($messages)){
?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Aviso! </strong>
		<?php
		foreach ($messages as $message){
				echo $message;
			}
		?>
	</div>	
<?php
	}
?>
