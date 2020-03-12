<?php 
    include "resources/header.php";

    
        if (isset($_GET['id'])){
            $id_documento=intval($_GET['id']);
            $sql_documento=mysqli_query($con,"select * from documentacion where id='$id_documento'");
            $count=mysqli_num_rows($sql_documento);
            $rw=mysqli_fetch_array($sql_documento);

            $documento_code=$rw['documento_code'];
            $idcliente=$rw['idcliente'];
            $idvehiculo=$rw['idvehiculo'];
            $foto1=$rw['foto1'];
            $foto2=$rw['foto2'];
            $foto3=$rw['foto3'];
            $foto4=$rw['foto4'];
            $foto5=$rw['foto5'];
            $foto6=$rw['foto6'];
            $fecha_carga=$rw['fecha_carga'];
        }


        $extension = pathinfo($foto1=$rw['foto1'], PATHINFO_EXTENSION);
        $extension2 = pathinfo($foto2=$rw['foto2'], PATHINFO_EXTENSION);
        $extension3 = pathinfo($foto3=$rw['foto3'], PATHINFO_EXTENSION);
        $extension4 = pathinfo($foto4=$rw['foto4'], PATHINFO_EXTENSION);
        $extension5 = pathinfo($foto5=$rw['foto5'], PATHINFO_EXTENSION);
        $extension6 = pathinfo($foto6=$rw['foto6'], PATHINFO_EXTENSION);
?>

    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class=""><a href="./?view=documentacion">Documentos</a></li>
                            <li class="active">Editar Documentos</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Editar Documentos</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img1">
            <?php 

            if ($extension == "pdf"){
            ?>

            <a href="" class="img-responsive" alt="<?php echo $extension ?>" data-toggle="modal" data-target="#myModal1" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto1;?>" style="width: 100%"></iframe >
            </a>

            <?php
            }else{
            ?>

                <img class="img-responsive" src="<?php echo  $foto1;?>" alt="Imagen del factura origen" data-toggle="modal" data-target="#myModal1" style='cursor:pointer'>
                
            <?php
                }
            ?>
                            </div>
                           <br>
            <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        
<?php 
            if ($extension == "pdf"){
?>
            <a href="" class="img-responsive" alt="Imagen del factura 1" data-toggle="modal" data-target="#myModal1" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe type="application/pdf"  src="<?php echo  $foto1;?>" style="width: 100%;height: 500px"></iframe>
            </a>    
<?php
            }else{
            ?>
                <img src="<?php echo  $foto1;?>" >
<?php
    }
?>
                    </div>
                </div>
            </div>
        </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img2">
            <?php 

            if ($extension2 == "pdf"){
            ?>

            <a href="" class="img-responsive" alt="<?php echo $extension2 ?>" data-toggle="modal" data-target="#myModal2" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto2;?>" style="width: 100%"></iframe >
            </a>

            <?php
            }else{
            ?>

                <img class="img-responsive" src="<?php echo  $foto2;?>" alt="<?php echo  $extension;?>" data-toggle="modal" data-target="#myModal2" style='cursor:pointer'>
                
            <?php
                }
            ?>
                            </div>
                            <br>
            <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        
<?php 
            if ($extension2 == "pdf"){
?>
            <a href="" class="img-responsive" alt="<?php echo  $extension2;?>" data-toggle="modal" data-target="#myModal2" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe type="application/pdf"  src="<?php echo  $foto2;?>" style="width: 100%;height: 500px"></iframe>
            </a>    
<?php
            }else{
            ?>
                <img src="<?php echo  $foto2;?>" >
<?php
    }
?>
                    </div>
                </div>
            </div>
        </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img3">
                            <?php 
                            if ($extension3 == "pdf"){
                            ?>
                            <a href="" class="img-responsive" alt="<?php echo $extension3 ?>" data-toggle="modal" data-target="#myModal3" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto3;?>" style="width: 100%"></iframe >
                            </a>
                            <?php
                            }else{
                            ?>
                                <img class="img-responsive" src="<?php echo  $foto3;?>" alt="<?php echo  $extension3;?>" data-toggle="modal" data-target="#myModal3" style='cursor:pointer'>
                                
                            <?php
                                }
                            ?>
                            </div>
                            <br>
                            <div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                              <?php 
                                               if ($extension3 == "pdf"){
                                                ?>
                                                <a href="" class="img-responsive" alt="<?php echo  $extension3;?>" data-toggle="modal" data-target="#myModal3" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                                    <iframe type="application/pdf"  src="<?php echo  $foto3;?>" style="width: 100%;height: 500px"></iframe>
                                                 </a>    
                                            <?php
                                                  }else{
                                                   ?>
                                                    <img src="<?php echo  $foto3;?>" >
                                            <?php
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img4">
                            <?php 
                            if ($extension4 == "pdf"){
                            ?>
                            <a href="" class="img-responsive" alt="<?php echo $extension4 ?>" data-toggle="modal" data-target="#myModal4" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto4;?>" style="width: 100%"></iframe >
                            </a>
                            <?php
                            }else{
                            ?>
                                <img class="img-responsive" src="<?php echo  $foto4;?>" alt="<?php echo  $extension4;?>" data-toggle="modal" data-target="#myModal4" style='cursor:pointer'>
                                
                            <?php
                                }
                            ?>
                            </a>

                            </div>
                            <br>
                            <div id="myModal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                              <?php 
                                               if ($extension4 == "pdf"){
                                                ?>
                                                <a href="" class="img-responsive" alt="<?php echo  $extension4;?>" data-toggle="modal" data-target="#myModal4" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                                    <iframe type="application/pdf"  src="<?php echo  $foto4;?>" style="width: 100%;height: 500px"></iframe>
                                                 </a>    
                                            <?php
                                                  }else{
                                                   ?>
                                                    <img src="<?php echo  $foto4;?>" >
                                            <?php
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img5">
                            <?php 
                            if ($extension5 == "pdf"){
                            ?>
                            <a href="" class="img-responsive" alt="<?php echo $extension5 ?>" data-toggle="modal" data-target="#myModal5" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto5;?>" style="width: 100%"></iframe >
                            </a>
                            <?php
                            }else{
                            ?>
                                <img class="img-responsive" src="<?php echo  $foto5;?>" alt="<?php echo  $extension5;?>" data-toggle="modal" data-target="#myModal5" style='cursor:pointer'>
                                
                            <?php
                                }
                            ?>
                            </a>
                            </div>
                            <br>
                            <div id="myModal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                              <?php 
                                               if ($extension5 == "pdf"){
                                                ?>
                                                <a href="" class="img-responsive" alt="<?php echo  $extension5;?>" data-toggle="modal" data-target="#myModal5" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                                    <iframe type="application/pdf"  src="<?php echo  $foto5;?>" style="width: 100%;height: 500px"></iframe>
                                                 </a>    
                                            <?php
                                                  }else{
                                                   ?>
                                                    <img src="<?php echo  $foto5;?>" >
                                            <?php
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img6">
                            <?php 
                            if ($extension6 == "pdf"){
                            ?>
                            <a href="" class="img-responsive" alt="<?php echo $extension6 ?>" data-toggle="modal" data-target="#myModal6" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto6;?>" style="width: 100%"></iframe >
                            </a>
                            <?php
                            }else{
                            ?>
                                <img class="img-responsive" src="<?php echo  $foto6;?>" alt="<?php echo  $extension6;?>" data-toggle="modal" data-target="#myModal6" style='cursor:pointer'>
                                
                            <?php
                                }
                            ?>
                            </div>
                            <br>
                            <div id="myModal6" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                              <?php 
                                               if ($extension6 == "pdf"){
                                                ?>
                                                <a href="" class="img-responsive" alt="<?php echo  $extension6;?>" data-toggle="modal" data-target="#myModal6" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                                                    <iframe type="application/pdf"  src="<?php echo  $foto6;?>" style="width: 100%;height: 500px"></iframe>
                                                 </a>    
                                            <?php
                                                  }else{
                                                   ?>
                                                    <img src="<?php echo  $foto5;?>" >
                                            <?php
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
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

                                <input type="hidden" class="form-control" id="documento_code" name="documento_code"  value="<?php echo $documento_code;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $id_documento;?>" >

     <div class="form-group">

    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
    <div class="col-sm-4">
        <select class="form-control" name="cliente" id="cliente" required>
            <?php 
                $sql_clientes=mysqli_query($con,"select * from cliente");
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
        <select class="form-control" name="vehiculo" id="vehiculo">
            <option value="">--- SELECCIONA ---</option>
        <?php
            $vehiculos=mysqli_query($con,"select * from vehiculo  where estado=1 order by marca");
            while ($rw=mysqli_fetch_array($vehiculos)) {
                if ($idvehiculo==$rw['id']){$selected1="selected";}else{$selected1="";}
        ?>
            <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['marca']?></option>
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
    function upload_foto1(id_documento){
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