<?php 

	$active13="active";
	include "admin/db.php";
	include "resources/header.php";
	$images = get_imgs();

	if ($_SESSION['tarjeta']==1){

 ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<section class="main-content-wrapper">

            <section id="main-content">
                <h1 class="text-center mb-3 p-5"><strong>Selecciona Imagen para el slide</strong></h1>

                <!--tiles start-->
                     <div class="buton " >
                         <a href='./?view=slidesadd' class="btn btn-default" >
                     <span class="glyphicon glyphicon-plus"></span> Agregar Slide</a>
                     </div>

                <div class="row" style="padding:3%">

                          <div id="loader" class="text-center">
                              <span><img src="view/img/ajax-loader.gif"></span>
                          </div>

                          <div class="outer_div"></div>

                </div>


            </section>
</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		load(1);
	});
	function load(page){
		var parametros = {"action":"ajax","page":page};
		$.ajax({
            url:'view/ajax/slider_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='view/img/ajax-loader.gif'>");
		  },
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

	function eliminar_slide(id){
		page=1;
		var parametros = {"action":"ajax","page":page,"id":id};
		if(confirm('Esta acción  eliminará de forma permanente el slide \n\n Desea continuar?')){
		$.ajax({
			url:'view/ajax/slider_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='view/img/ajax-loader.gif'>");
		  },
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	}
</script>

<?php
  include "resources/footer.php";
   }else{
     require 'resources/acceso_prohibido.php';
  }
   ob_end_flush(); 
?>




