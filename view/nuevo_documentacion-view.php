<?php 
   
    include "resources/header.php";

    

        $cliente=time()."-".$_SESSION['user_id'];
        $documento_code=time()."-".$_SESSION['user_id'];
        $vehiculo=time()."-".$_SESSION['user_id'];
        $created_at=date("Y-m-d H:i:s");
        $target_dir="view/resources/images/vehiculo.jpg";
        $inser=mysqli_query($con,"INSERT INTO documentacion (id, idcliente, documento_code, idvehiculo, foto1, foto2, foto3, foto4, foto5, foto6, fecha_carga) VALUES (NULL, '".$cliente."' ,'$documento_code', '$vehiculo','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir', '$created_at'); ");
        $sql_documento=mysqli_query($con,"select * from documentacion where  documento_code='$documento_code'");
        $rw_documento=mysqli_fetch_array($sql_documento);
        $id_documento=$rw_documento['id'];
        
        $count=mysqli_query($con,"select count(*) as total from documentacion");
        $rw=mysqli_fetch_array($count);
        $documento_codes=$rw['total']+1;

?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class=""><a href="./?view=documentacion">Documento</a></li>
                            <li class="active">Nuevo Documento</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Nuevo Documento</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img1">
                                <img class=" img-responsive" src="view/resources/images/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img2">
                                <img class=" img-responsive" src="view/resources/images/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img3">
                                <img class=" img-responsive" src="view/resources/images/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img4">
                                <img class=" img-responsive" src="view/resources/images/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img5">
                                <img class=" img-responsive" src="view/resources/images/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img6">
                                <img class=" img-responsive" src="view/resources/images/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del Documento</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>

                        <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" id="documento_code" name="documento_code"  value="<?php echo $documento_codes;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $id_documento;?>" >


                                <div class="form-group">

<label for="cliente" class="col-sm-2 control-label">Cliente: </label>
<div class="col-sm-4">
    <select class="form-control" name="cliente" id="cliente" required>
        <?php 
            $sql_clientes=mysqli_query($con,"select * from cliente where status=1 order by nombre");
            while ($rw=mysqli_fetch_array($sql_clientes)){
                $idcliente=$rw['id'];
                $nombre_cliente=$rw['nombre']." ".$rw['apellido'];
            ?>
            <option value="<?php echo $idcliente;?>"><?php echo $nombre_cliente;?></option>
            <?php
            }
        ?>
    </select>    
</div>
            
                        <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                        <div class="col-sm-4">
                                        <select class="form-control" name="vehiculo" id="vehiculo" required>
                                            <?php 
                                            $sql_vehiculos=mysqli_query($con,"select * from vehiculo");
                                                while ($rw=mysqli_fetch_array($sql_vehiculos)){
                                                    $idvehiculo=$rw['id'];
                                                    $patente_vehiculo=$rw['patente'];
                                                ?>
                                                <option value="<?php echo $idvehiculo;?>"><?php echo $patente_vehiculo;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                </div>
                                
                                <div class="form-group">
                                    <label for="imagefile1" class="col-sm-2 control-label">Documento: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile1" class="form-control" id="imagefile1" onchange="upload_foto1(<?php echo $id_documento; ?>);">
                                    </div>
                                    <label for="imagefile2" class="col-sm-2 control-label">Factura Origen: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile2" class="form-control" id="imagefile2" onchange="upload_foto2(<?php echo $id_documento; ?>);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagefile3" class="col-sm-2 control-label">Refactura 1: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile3" class="form-control" id="imagefile3" onchange="upload_foto3(<?php echo $id_documento; ?>);">
                                    </div>
                                    <label for="imagefile4" class="col-sm-2 control-label">Refactura 2: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile4" class="form-control" id="imagefile4" onchange="upload_foto4(<?php echo $id_documento; ?>);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagefile5" class="col-sm-2 control-label">Refactura 3: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile5" class="form-control" id="imagefile5" onchange="upload_foto5(<?php echo $id_documento; ?>);">
                                    </div>
                                    <label for="imagefile6" class="col-sm-2 control-label">Tenencia: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile6" class="form-control" id="imagefile6" onchange="upload_foto6(<?php echo $id_documento; ?>);">
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary actualizar_datos">Guardar datos</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>       

        </section>
    </section><!--main content end-->
<?php  include "resources/footer.php" ?>
<script>
    function upload_foto(id_documento){
            $("#load_img1").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile1");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile1',file);
            data.append('id',id_documento);
            
            
            $.ajax({
                url: "view/ajax/images/foto1_documentacion_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img1").html(data);
                    
                }
            });
            
        }
        function upload_foto2(id_documento){
            $("#load_img2").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile2");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile2',file);
            data.append('id',id_documento);
            
            
            $.ajax({
                url: "view/ajax/images/foto2_documentacion_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img2").html(data);
                    
                }
            });
            
        }
    function upload_foto3(id_documento){
            $("#load_img3").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile3");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile3',file);
            data.append('id',id_documento);
            
            
            $.ajax({
                url: "view/ajax/images/foto3_documentacion_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img3").html(data);
                    
                }
            });
            
        }
    function upload_foto4(id_documento){
            $("#load_img4").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile4");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile4',file);
            data.append('id',id_documento);
            
            
            $.ajax({
                url: "view/ajax/images/foto4_documentacion_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img4").html(data);
                    
                }
            });
            
        }
        function upload_foto5(id_documento){
            $("#load_img5").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile5");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile5',file);
            data.append('id',id_documento);
            
            
            $.ajax({
                url: "view/ajax/images/foto5_documentacion_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img5").html(data);
                    
                }
            });
            
        }
        function upload_foto6(id_documento){
            $("#load_img6").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile6");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile6',file);
            data.append('id',id_documento);
            
            
            $.ajax({
                url: "view/ajax/images/foto6_documentacion_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img6").html(data);
                    
                }
            });
            
        }
</script>
    <script>
    $( "#update_register" ).submit(function( event ) {
      $('.actualizar_datos').attr("disabled", true);
      var parametros = $(this).serialize();
      $.ajax({
            type: "POST",
            url: "view/ajax/agregar/actualizar_documentacion.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados_ajax").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#resultados_ajax").html(datos);
            $('.actualizar_datos').attr("disabled", false);
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();});}, 5000);
            
          }
    });     
      event.preventDefault();
    });
</script>
<?php 
    ob_end_flush(); 
?>