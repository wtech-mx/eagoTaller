<?php 
    $active8="active";
    include "resources/header.php";

    if ($_SESSION['vehiculo']==1){
    
        if (isset($_GET['id'])){
            $vehiculo_id=intval($_GET['id']);
            $sql_vehiculo=mysqli_query($con,"select * from vehiculo where id='$vehiculo_id'");
            $count=mysqli_num_rows($sql_vehiculo);
            $rw=mysqli_fetch_array($sql_vehiculo);

            $vehiculo_code=$rw['vehiculo_code'];
            $idcliente=$rw['idcliente'];
            $patente=$rw['patente'];
            $marca=$rw['marca'];
            $modelo=$rw['modelo'];
            $nro_chasis=$rw['nro_chasis'];
            $nro_motor=$rw['nro_motor'];
            $vto_vtv=$rw['vto_vtv'];
            $idseguro=$rw['idseguro'];
            $color=$rw['color'];
            $status=$rw['estado'];
            $foto4=$rw['foto4'];
            $foto1=$rw['foto1'];
            $foto2=$rw['foto2'];
            $foto3=$rw['foto3'];
            $fecha_carga=$rw['fecha_carga'];
        }
        
        if (!isset($_GET['id']) or $count!=1){
            header("location: ./?view=vehiculos");
        }

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
                            <li class="active">Editar Vehiculo</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Editar Vehiculo</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img4">
                                <img class=" img-responsive" src="<?php echo  $foto4;?>" alt="Foto del vehiculo" data-toggle="modal" data-target="#myModal4" style='cursor:pointer'>
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
                                            <img src="<?php echo $foto4;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img">
                                <img class=" img-responsive" src="<?php echo  $foto1;?>" alt="Foto del vehiculo" data-toggle="modal" data-target="#myModal1" style='cursor:pointer'>
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
                                            <img src="<?php echo $foto1;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img2">
                                <img class=" img-responsive" src="<?php echo  $foto2;?>" alt="Foto del vehiculo" data-toggle="modal" data-target="#myModal2" style='cursor:pointer'>
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
                                            <img src="<?php echo $foto2;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img3">
                                <img class=" img-responsive" src="<?php echo  $foto3;?>" alt="Foto del vehiculo" data-toggle="modal" data-target="#myModal3" style='cursor:pointer'>
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
                                            <img src="<?php echo $foto3;?>" class="img-responsive">
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
                            <h3 class="panel-title">Datos del Vehiculo</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>

                        <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" id="vehiculo_code" name="vehiculo_code"  value="<?php echo $vehiculo_code;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $vehiculo_id;?>" >

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

                                    <label for="patente" class="col-sm-2 control-label">Placas: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="patente" class="form-control" id="patente" placeholder="Placas " value="<?php echo $patente ?>">
                                    </div>
                                    <label for="marca" class="col-sm-2 control-label">Marca: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="marca" class="form-control" id="marca" placeholder="Marca: " value="<?php echo $marca ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="modelo" class="col-sm-2 control-label">Modelo: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="modelo" class="form-control" id="modelo" placeholder="Modelo: " value="<?php echo $modelo ?>">
                                    </div>
                                    <label for="chasis" class="col-sm-2 control-label">Chasis: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="chasis" class="form-control" id="chasis" placeholder="Numero Chasis: " value="<?php echo $nro_chasis ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motor" class="col-sm-2 control-label">Motor: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="motor" class="form-control" id="motor" placeholder="Numero Motor: " value="<?php echo $nro_motor ?>">
                                    </div>
                                    <label for="vto_vtv" class="col-sm-2 control-label">Vencimiento de Tarjeta de circulación: </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="vto_vtv" class="form-control" id="vto_vtv" placeholder="Vto Vtv: " value="<?php echo $vto_vtv ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seguro" class="col-sm-2 control-label">Seguro: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="seguro" id="seguro" required>
                                            <option value="">Selecciona</option>
                                            <?php 
                                                $sql=mysqli_query($con,"select *  from seguro order by nombre");
                                                while ($rw=mysqli_fetch_array($sql)){
                                                    $idsegu=$rw['id'];
                                                    $nombre=$rw['nombre'];
                                                    if ($idseguro==$idsegu){$selected1="selected";}else{$selected1="";}
                                                ?>
                                                <option value="<?php echo $idsegu;?>" <?php echo $selected1;?>><?php echo $nombre;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="color" class="col-sm-2 control-label">Color: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="color" class="form-control" id="color" placeholder="Color: " value="<?php echo $color ?>">
                                    </div>
                                    <label for="estado" class="col-sm-2 control-label">Estado: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="estado" id="estado">
                                            <option value="1" <?php if ($status==1){echo "selected";}?>>Activo</option>
                                            <option value="2" <?php if ($status==2){echo "selected";}?>>Inactivo</option>
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="imagefile" class="col-sm-2 control-label">Foto 1: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile" class="form-control" id="imagefile" onchange="upload_foto1(<?php echo $vehiculo_id; ?>);">
                                    </div>
                                    <label for="imagefile2" class="col-sm-2 control-label">Foto 2: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile2" class="form-control" id="imagefile2" onchange="upload_foto2(<?php echo $vehiculo_id; ?>);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagefile3" class="col-sm-2 control-label">Foto 3: </label>
                                    <div class="col-sm-4">
                                <input type="file" name="imagefile3" class="form-control" id="imagefile3" onchange="upload_foto3(<?php echo $vehiculo_id; ?>);">
                                    </div>
                                    <label for="imagefile4" class="col-sm-2 control-label">Foto 4: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile4" class="form-control" id="imagefile4" onchange="upload_foto4(<?php echo $vehiculo_id; ?>);">
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
    function upload_foto1(vehiculo_id){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile',file);
        data.append('id',vehiculo_id);
        
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
    function upload_foto2(vehiculo_id){
        $("#load_img2").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile2");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile2',file);
        data.append('id',vehiculo_id);
        
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
    function upload_foto3(vehiculo_id){
        $("#load_img3").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile3");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile3',file);
        data.append('id',vehiculo_id);
        
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
    function upload_foto4(vehiculo_id){
        $("#load_img4").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile4");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile4',file);
        data.append('id',vehiculo_id);
        
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