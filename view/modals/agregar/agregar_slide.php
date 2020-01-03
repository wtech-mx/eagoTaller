	<button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Agregar Slide</button>    

	      <!-- Form Modal -->
	    <div class="modal fade" id="formModal" tabindex="-1" role="dialog"  aria-labelledby="myLargeModalLabel" aria-hidden="true">
	        <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content">

						<link rel="stylesheet" type="text/css" href="assets/css/form.css">
							<div class="contenedor">
								<div class="row justify-content-start ">
									<div class="col p-5">
										<div class="post">
											<article class="text-left">
												<h2 class="titulo" style="padding: 20px;">Subir imagenes o archivos</h2>

												<form action="admin/upload.php" enctype="multipart/form-data" class="formulario" method="post">
													  <div class="form-group">
													    <label for="exampleInputPassword1">Texto a mostrar</label>
													    <input type="text"  name="title" class="form-control"  placeholder="Texto a mostrar">
													  </div>

											  		  <div class="form-group">
													    <label for="EnlaceBoton">Enlace del Boton</label>
													    <input type="text"  name="boton" class="form-control"  placeholder="Texto a mostrar">
													  </div>
													  
													  <div class="form-group">
													    <label for="exampleInputFile">Imagen</label>
													    <input type="file" name="image" required>
													  </div>

													<input type="submit" value="Subir imagen" class="btn btn-primary">

												</form>
											</article>
										</div>
									</div>
								</div>
							</div>
				</div>
	        </div>
	    </div>
	    <!-- End Form Modal -->