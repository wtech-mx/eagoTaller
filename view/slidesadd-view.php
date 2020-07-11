<?php

	$active13="active";
	include "admin/db.php";
	include "resources/header.php";
	$images = get_imgs();

	if ($_SESSION['tarjeta']==1){


//Insert un nuevo producto
$imagen_demo="demo.png";
$insert=mysqli_query($con,"insert into slider (url_image, estado) values ('$imagen_demo','0')");
$sql_last=mysqli_query($con,"select LAST_INSERT_ID(id) as last from slider order by id desc limit 0,1");
$rw=mysqli_fetch_array($sql_last);
$id_slide=$rw['last'];
$active_config="active";
$active_slider="active";
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<section class="main-content-wrapper">
            <section id="main-content">
                <h1 class="text-center mb-3 p-5"><strong>Caracteristicas del Slide </strong></h1>
                <a class="btn btn-primary" href="<?=$_SERVER['HTTP_REFERER'] ?>">Volver</a>
                    <div class="container">

                         <div class="col-md-6 col-sm-6">
                            <h3 class="text-center"><span class="glyphicon glyphicon-edit"></span> Agregar  slide</h3>
                            <form class="form-horizontal" id="editar_slide">

                              <div class="form-group">
                                <label for="titulo" class="col-sm-3 control-label">Titulo</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="titulo" value="" required name="titulo">
                                  <input type="hidden" class="form-control" id="id_slide" value="<?php echo intval($id_slide);?>" name="id_slide">
                                </div>
                              </div>

                             <div class="form-group">
                                <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control " rows="5" id="descripcion" required name="descripcion"></textarea>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="texto_boton" class="col-sm-3 control-label">Texto del boton</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="texto_boton" name="texto_boton" value="Comprar ahora!">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="url_boton" class="col-sm-3 control-label">URL del boton</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="url_boton" name="url_boton" value="">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="color" class="col-sm-3 control-label">Color de Fondo</label>
                                <div class="col-sm-9">
                                  <input type="color" class="form-control" id="color" name="color" value="#fff">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="texto_boton" class="col-sm-3 control-label">Color del boton</label>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-info btn-sm"><input type="radio" name="estilo" value="info" checked> </button>
                                    <button  type="button" class="btn btn-warning btn-sm"><input type="radio" name="estilo" value="warning"> </button>
                                    <button type="button" class="btn btn-primary btn-sm"><input type="radio" name="estilo" value="primary">  </button>
                                    <button type="button" class="btn btn-success btn-sm"><input type="radio" name="estilo" value="success">  </button>
                                    <button type="button" class="btn btn-danger btn-sm"><input type="radio" name="estilo" value="danger">  </button>
                                </div>

                              </div>

                              <div class="form-group">
                                <label for="orden" class="col-sm-3 control-label">Orden</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" id="orden" name="orden" value="1">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="estado" class="col-sm-3 control-label">Estado</label>
                                <div class="col-sm-9">
                                  <select class="form-control" id="estado" required name="estado">
                                    <option value="0" >Inactivo</option>
                                    <option value="1" >Activo</option>
                                 </select>
                                </div>
                              </div>

                              <div class="form-group">
                              <div id='loader'></div>
                              <div class='outer_div'></div>
                                <div class="col-sm-offset-3 col-sm-9">
                                  <button type="submit" class="btn btn-success">Actualizar datos</button>
                                </div>

                              </div>

                            </form>

                        </div>

                        <div class="col-md-auto col-sm-4">
                            <h3 class="text-center"><span class="glyphicon glyphicon-picture"></span> Imagen</h3>

                             <form class="form-vertical">

                                <div class="form-group">
                                     <div class="fileinput fileinput-new" data-provides="fileinput">
                                         <div class="fileinput-new thumbnail" style="max-width: 100%;" >
                                             <img class="img-rounded" src="view/img/slider/<?php echo $imagen_demo;?>" />
                                         </div>
                                         <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 250px;"></div>
                                         <div>
                                             <span class="btn btn-info btn-file"><span class="fileinput-new">Selecciona una imagen</span>
                                             <span class="fileinput-exists" onclick="upload_image();">Cambiar imagen</span><input type="file" name="fileToUpload" id="fileToUpload" required onchange="upload_image();"></span>

                                             <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Cancelar</a>
                                         </div>
                                     </div>
                                        <div class="upload-msg"></div>

                                    <p class="text-primary text-center">Tamaño recomendado es de 1100 x 500 píxeles.</p>
                                  </div>

                             </form>
                        </div>


                    </div>
            </section>
</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>

	<script>
			function upload_image(){
				$(".upload-msg").text('Cargando...');
				var id_slide=$("#id_slide").val();
				var inputFileImage = document.getElementById("fileToUpload");
				var file = inputFileImage.files[0];
				var data = new FormData();
				data.append('fileToUpload',file);
				data.append('id',id_slide);
				
				$.ajax({
					url: "view/ajax/upload_slide.php",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						$(".upload-msg").html(data);
						window.setTimeout(function() {
						$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove();
						});	}, 5000);
					}
				});
				
			}
			
			function eliminar(id){
				var parametros = {"action":"delete","id":id};
						$.ajax({
							url:'ajax/upload2.php',
							data: parametros,
							 beforeSend: function(objeto){
							$(".upload-msg2").text('Cargando...');
						  },
							success:function(data){
								$(".upload-msg2").html(data);
								
							}
						})
					
				}

	</script>
	<script>
		$("#editar_slide").submit(function(e) {
			
			  $.ajax({
				  url: "view/ajax/editar_slide.php",
				  type: "POST",
				  data: $("#editar_slide").serialize(),
				   beforeSend: function(objeto){
					$("#loader").html("Cargando...");
				  },
				  success:function(data){
						$(".outer_div").html(data).fadeIn('slow');
						$("#loader").html("");
					}
			});
			 e.preventDefault();
		});
	</script>

<?php
  include "resources/footer.php";
   }else{
     require 'resources/acceso_prohibido.php';
  }
   ob_end_flush();
?>
