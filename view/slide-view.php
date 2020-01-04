<?php 

	$active13="active";
	include "admin/db.php";
	include "resources/header.php";
	$images = get_imgs();

	if ($_SESSION['tarjeta']==1){

 ?>

 <section class="main-content-wrapper">
    <section id="main-content">
		<div class="contenedor p-5">
			<div class="row">
					<div class="col-md-12">
						<h1>Imagenes</h1>
						<!--<a href="admin/form.php" class="btn btn-primary" style="color: #fff">Agregar Slide</a> -->

                    <!-- modals -->
                        <?php 
                            include "modals/agregar/agregar_slide.php";
                        ?>
                    <!-- /end modals -->


						<br>
						<br>
						<?php if(count($images)>0):?>

						<table class="table table-bordered">
							<thead>
								<th>Imagen</th>
								<th>Texto a mostrar</th>
								<th>Enlace del Boton</th>
								<th>Acciones</th>
										
							</thead>
							<?php foreach($images as $img):?>
							<tr>
								<td>
								<img class="img-fluid" src="admin/<?php echo $img->folder.$img->src; ?>" style="width:240px;" alt="admin/<?php echo $img->folder.$img->src; ?>">
							</td>
							<td><?php echo $img->title; ?></td>
							<td><?php echo $img->boton; ?></td>
							<td>
							<a class="btn btn-primary btn-sm" href="admin/download.php?id=<?php echo $img->id; ?>">Descarga</a>
							<a class="btn btn-danger btn-sm" href="admin/delete.php?id=<?php echo $img->id; ?>" style="color: #fff;">Eliminar</a>

								</td>
							</tr>
						<?php endforeach;?>
						</table>

						<?php else:?>
							<h4 class="alert alert-warning">No hay imagenes!</h4>
						<?php endif; ?>
				</div>
			</div>
		</div>

	</section>
</section>

<?php
  include "resources/footer.php";
   }else{
     require 'resources/acceso_prohibido.php';
  }
   ob_end_flush(); 
?>




