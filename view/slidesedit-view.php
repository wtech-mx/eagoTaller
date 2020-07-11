<?php

	$active13="active";
	include "admin/db.php";
	include "resources/header.php";
	$images = get_imgs();

	if ($_SESSION['tarjeta']==1){


/* Llamar la Cadena de Conexion*/
include ("config/conexion.php");
//Insert un nuevo producto
$imagen_demo="demo.png";
$id_slide=intval($_GET['id']);
$sql=mysqli_query($con,"select * from slider where id='$id_slide' limit 0,1");
$count=mysqli_num_rows($sql);
if ($count==0){
	header("location: sliderslist.php");
	exit;
}
$rw=mysqli_fetch_array($sql);
$titulo=$rw['titulo'];
$color_titulo=$rw['color_titulo'];
$descripcion=$rw['descripcion'];
$color_descripcion=$rw['color_descripcion'];
$texto_boton=$rw['texto_boton'];
$url_boton=$rw['url_boton'];
$color=$rw['color'];
$estilo_boton=$rw['estilo_boton'];
$url_image=$rw['url_image'];
$orden=($rw['orden']);
$estado=($rw['estado']);
$active_config="active";
$active_slider="active";
?>

<section class="main-content-wrapper">
            <section id="main-content">

                <h1 class="text-center mb-3 p-5"><strong>Caracteristicas del Slide </strong></h1>
                <a class="btn btn-primary" href="<?=$_SERVER['HTTP_REFERER'] ?>">Volver</a>
                    <div class="container">

                         <div class="col-md-6 col-sm-6">
                            <h3 class="text-center"><span class="glyphicon glyphicon-edit"></span> Editar slide</h3>
                            <form class="form-horizontal" id="editar_slide">

                                  <div class="form-group">
                                    <label for="titulo" class="col-sm-3 control-label">Titulo</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="titulo" value="<?php echo $titulo;?>" required name="titulo">
                                      <input type="hidden" class="form-control" id="id_slide" value="<?php echo intval($id_slide);?>" name="id_slide">
                                    </div>
                                  </div>

                                 <div class="form-group">
                                    <label for="color_titulo" class="col-sm-3 control-label">Color de Titulo</label>
                                    <div class="col-sm-9">
                                      <input type="color" class="form-control" id="color_titulo" name="color_titulo" value="<?php echo $color_titulo;?>">
                                    </div>
                                  </div>

                                 <div class="form-group">
                                    <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control " rows="5" id="descripcion" required name="descripcion"><?php echo $descripcion;?></textarea>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="color_descripcion" class="col-sm-3 control-label">Color de Descripción</label>
                                    <div class="col-sm-9">
                                      <input type="color" class="form-control" id="color_descripcion" name="color_descripcion" value="<?php echo $color_descripcion;?>">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="texto_boton" class="col-sm-3 control-label">Texto del boton</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="texto_boton" name="texto_boton" value="<?php echo $texto_boton?>">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="url_boton" class="col-sm-3 control-label">URL del boton</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="url_boton" name="url_boton" value="<?php echo $url_boton;?>">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="color" class="col-sm-3 control-label">Color de Fondo</label>
                                    <div class="col-sm-9">
                                      <input type="color" class="form-control" id="color" name="color" value="<?php echo $color;?>">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="texto_boton" class="col-sm-3 control-label">Color del boton</label>
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-info btn-sm"><input type="radio" name="estilo" value="info" <?php if ($estilo_boton=="info"){echo "checked";}?>> </button>
                                        <button  type="button" class="btn btn-warning btn-sm"><input type="radio" name="estilo" value="warning" <?php if ($estilo_boton=="warning"){echo "checked";}?>> </button>
                                        <button type="button" class="btn btn-primary btn-sm"><input type="radio" name="estilo" value="primary" <?php if ($estilo_boton=="primary"){echo "checked";}?>>  </button>
                                        <button type="button" class="btn btn-success btn-sm"><input type="radio" name="estilo" value="success" <?php if ($estilo_boton=="success"){echo "checked";}?>>  </button>
                                        <button type="button" class="btn btn-danger btn-sm"><input type="radio" name="estilo" value="danger" <?php if ($estilo_boton=="danger"){echo "checked";}?>>  </button>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="orden" class="col-sm-3 control-label">Orden</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" id="orden" name="orden" value="<?php echo $orden;?>">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="estado" class="col-sm-3 control-label">Estado</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" id="estado" required name="estado">
                                        <option value="0" <?php if($estado==0){echo "selected";} ?>>Inactivo</option>
                                        <option value="1" <?php if($estado==1){echo "selected";} ?>>Activo</option>
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

                                    <div class="col-sm-12">
                                         <div class="fileinput fileinput-new" data-provides="fileinput">
                                             <div class="fileinput-new thumbnail" style="max-width: 100%;" >
                                                 <img class="img-rounded" src="view/img/slider/<?php echo $url_image;?>" />
                                             </div>

                                             <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 250px;"></div>
                                             <div>
                                                 <span class="btn btn-info btn-file"><span class="fileinput-new">Selecciona una imagen</span>
                                                     <span class="fileinput-exists" onclick="upload_image();">Cambiar imagen</span><input type="file" name="fileToUpload" id="fileToUpload" required onchange="upload_image();"></span>
                                                 <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Cancelar</a>
                                             </div>
                                         </div>

                                        <div class="upload-msg"></div>
                                    </div>
                                    <p class="text-primary text-center">Tamaño recomendado es de 1100 x 500 píxeles.</p>

                                </div>

                             </form>
                        </div>
                    </div>

            </section>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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




