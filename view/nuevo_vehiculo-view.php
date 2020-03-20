<?php 
    $active8="active";
    include "resources/header.php";

    if ($_SESSION['vehiculo']==1){

      
        $vehiculo_code=time()."-".$_SESSION['user_id'];
        $estado=time()."-".$_SESSION['user_id'];
        $created_at=date("Y-m-d H:i:s");
        $target_dir="view/resources/images/vehiculos/vehiculo.jpg";
        $inser=mysqli_query($con,"INSERT INTO vehiculo (id, id_cliente, vehiculo_code, patente, marca, submarca, modelo, nro_chasis, nro_motor, vto_vtv, seguro, poliza, vencimiento, color, foto4, foto1, foto2, foto3, foto5, foto6, foto7, foto8, foto9, foto10, estado, fecha_carga) VALUES (NULL, '0','$vehiculo_code', '', '', '', '', '', '', '', '', '', '', '','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir','$estado', '$created_at'); ");
        $sql_vehiculo=mysqli_query($con,"select * from vehiculo where  vehiculo_code='$vehiculo_code'");
        $rw_vehiculo=mysqli_fetch_array($sql_vehiculo);
        $id_vehiculo=$rw_vehiculo['id'];
        
        $count=mysqli_query($con,"select count(*) as total from vehiculo where id_cliente>0");
        $rw=mysqli_fetch_array($count);
        $vehiculo_codes=$rw['total']+1;

?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class=""><a href="./?view=vehiculos">Vehiculos</a></li>
                            <li class="active">Nuevo Vehiculo</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Nuevo Vehiculo</h1>
                </div>
            </div>
            
            <div class="row">


            <div class="col-md-9">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del Vehiculo</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" id="vehiculo_code" name="vehiculo_code"  value="<?php echo $vehiculo_codes;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $id_vehiculo;?>" >

                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img2">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img3">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img4">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img5">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img6">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img7">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img8">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img9">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img10">
                                <img class=" img-responsive" src="view/resources/images/vehiculos/vehiculo.jpg" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
                <div class="col-md-9">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del Vehiculo</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>

                        <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" id="vehiculo_code" name="vehiculo_code"  value="<?php echo $vehiculo_codes;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $id_vehiculo;?>" >


                                <div class="form-group">
                                    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <?php 
                                                $sql_clientes=mysqli_query($con,"select * from cliente");
                                                while ($rw=mysqli_fetch_array($sql_clientes)){
                                                    $idcliente=$rw['id_cliente'];
                                                    $nombre_cliente=$rw['nombre']." ".$rw['apellido'];
                                                ?>
                                                <option value="<?php echo $idcliente;?>"><?php echo $nombre_cliente;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                    <label for="patente" class="col-sm-2 control-label">Placas: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="patente" class="form-control" id="patente" placeholder="Placas: ">
                                    </div>
                                </div>

                                <div class="form-group">                                    
                                    <label for="marca" class="col-sm-2 control-label">Marca: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="marca" class="form-control" id="marca" placeholder="Marca: ">
                                    </div>
                                    <label for="submarca" class="col-sm-2 control-label">Submarca: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="submarca" class="form-control" id="submarca" placeholder="Submarca: ">
                                    </div>
                                </div>

                                <div class="form-group">                                   
                                    <label for="modelo" class="col-sm-2 control-label">Modelo: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="modelo" class="form-control" id="modelo" placeholder="Modelo: ">
                                    </div>
                                    <label for="chasis" class="col-sm-2 control-label">Chasis: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="chasis" class="form-control" id="chasis" placeholder="Numero Chasis: ">
                                    </div>
                                </div>

                                <div class="form-group">  
                                    <label for="vto_vtv" class="col-sm-2 control-label">Vencimiento de Tarjeta de circulación: </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="vto_vtv" class="form-control" id="vto_vtv" placeholder="Vto Vtv: ">
                                    </div>                                                   
                                    <label for="motor" class="col-sm-2 control-label">Motor: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="motor" class="form-control" id="motor" placeholder="Numero Motor: ">
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <label for="seguro" class="col-sm-2 control-label">Seguro: </label>
                                    <div class="col-sm-4">
                                        <input type="text"  name="seguro" class="form-control" id="seguro" placeholder="seguro: ">
                                    </div>
                                    <label for="poliza" class="col-sm-2 control-label">Poliza de seguro: </label>
                                    <div class="col-sm-4">
                                        <input type="text"  name="poliza" class="form-control" id="poliza" placeholder="Poliza: ">
                                    </div>
                                </div>

                                <div class="form-group">    
                                    <label for="vencimiento" class="col-sm-2 control-label">Vencimiento de seguro: </label>
                                    <div class="col-sm-4">
                                        <input type="date"  name="vencimiento" class="form-control" id="vencimiento" placeholder="Vencimiento: ">
                                    </div>
                                    <label for="color" class="col-sm-2 control-label">Color: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="color" class="form-control" id="color" placeholder="Color: ">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="imagefile4" class="col-sm-2 control-label">Imagen: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile4" class="form-control" id="imagefile4" onchange="upload_foto4(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                    <label for="imagefile1" class="col-sm-2 control-label">foto1: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile1" class="form-control" id="imagefile1" onchange="upload_foto1(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="imagefile2" class="col-sm-2 control-label">foto2: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile2" class="form-control" id="imagefile2" onchange="upload_foto2(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                    <label for="imagefile3" class="col-sm-2 control-label">foto3: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile3" class="form-control" id="imagefile3" onchange="upload_foto3(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="imagefile5" class="col-sm-2 control-label">foto5: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile5" class="form-control" id="imagefile5" onchange="upload_foto5(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                    <label for="imagefile6" class="col-sm-2 control-label">foto6: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile6" class="form-control" id="imagefile6" onchange="upload_foto6(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="imagefile7" class="col-sm-2 control-label">foto7: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile7" class="form-control" id="imagefile7" onchange="upload_foto7(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                    <label for="imagefile8" class="col-sm-2 control-label">foto8: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile8" class="form-control" id="imagefile8" onchange="upload_foto8(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="imagefile9" class="col-sm-2 control-label">foto9: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile9" class="form-control" id="imagefile9" onchange="upload_foto9(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                    <label for="imagefile10" class="col-sm-2 control-label">foto10: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile10" class="form-control" id="imagefile10" onchange="upload_foto10(<?php echo $id_vehiculo; ?>);">
                                    </div>
                                </div>

                            <div class="form-group">
                                <label for="estado" class="col-sm-2 control-label">Estado: </label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="estado" id="estado">
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
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
    function upload_foto1(id_vehiculo){
            $("#load_img1").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile1");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile1',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto1_vehiculo_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img").html(data);
                    
                }
            });
            
        }
        function upload_foto2(id_vehiculo){
            $("#load_img2").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile2");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile2',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto2_vehiculo_ajax.php",        // Url to which the request is send
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
    function upload_foto3(id_vehiculo){
            $("#load_img3").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile3");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile3',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto3_vehiculo_ajax.php",        // Url to which the request is send
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
    function upload_foto4(id_vehiculo){
            $("#load_img4").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile4");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile4',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto4_vehiculo_ajax.php",        // Url to which the request is send
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
        function upload_foto5(id_vehiculo){
            $("#load_img5").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile5");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile5',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto5_vehiculo_ajax.php",        // Url to which the request is send
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
        function upload_foto6(id_vehiculo){
            $("#load_img6").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile6");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile6',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto6_vehiculo_ajax.php",        // Url to which the request is send
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
        function upload_foto7(id_vehiculo){
            $("#load_img7").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile7");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile7',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto7_vehiculo_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img7").html(data);
                    
                }
            });
            
        }
        function upload_foto8(id_vehiculo){
            $("#load_img8").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile8");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile8',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto8_vehiculo_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img8").html(data);
                    
                }
            });
            
        }
        function upload_foto9(id_vehiculo){
            $("#load_img9").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile9");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile9',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto9_vehiculo_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img9").html(data);
                    
                }
            });
            
        }
        function upload_foto10(id_vehiculo){
            $("#load_img10").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile10");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile10',file);
            data.append('id',id_vehiculo);
            
            
            $.ajax({
                url: "view/ajax/images/foto10_vehiculo_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img10").html(data);
                    
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
            url: "view/ajax/agregar/actualizar_vehiculo.php",
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
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush(); 
?>