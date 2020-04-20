<?php
    $active13="active";
    include "resources/header.php";

    if ($_SESSION['adminser']==1){

        if (isset($_GET['id'])){
            $trasser_id=intval($_GET['id']);
            $sql_trasser=mysqli_query($con,"select * from traslados where id='$trasser_id'");
            $count=mysqli_num_rows($sql_trasser);
            $rw=mysqli_fetch_array($sql_trasser);

            $fecha_tras=$rw['fecha_tras'];

             $idcliente=$rw['id_cliente'];
                $clientes=mysqli_query($con, "select * from cliente where id_cliente=$idcliente");
                $cliente_rw=mysqli_fetch_array($clientes);
                $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

            $idempresa=$rw['id_empresa'];
                $empresas=mysqli_query($con, "select * from empresa where id_empresa=$idempresa");
                $empresa_rw=mysqli_fetch_array($empresas);
                $nombre_empresa=$empresa_rw['nombre'];

            $status=$rw['status'];
            $datos=$rw['datos'];
            $foto4=$rw['foto4'];
            $foto1=$rw['foto1'];
            $foto2=$rw['foto2'];
            $foto3=$rw['foto3'];
            $foto5=$rw['foto5'];
            $foto6=$rw['foto6'];
            $foto7=$rw['foto7'];
            $foto8=$rw['foto8'];
            $foto9=$rw['foto9'];
            $foto10=$rw['foto10'];
            $fecha_carga=$rw['fecha_carga'];
        }

        if (!isset($_GET['id']) or $count!=1){
            header("location: ./?view=trasser");
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
                            <li class=""><a href="./?view=trasser">Comprobación</a></li>
                            <li class="active">Comprobación de servicio</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Comprobación de servicio</h1>
                </div>
            </div>

        <div class="row">
                 <div class="col-md-12">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del Servicio</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">
                            <input type="hidden"  id="id" name="id"  value="<?php echo $trasser_id;?>" >
                            <div class="form-group">
                                <label for="idfecha_tras" class="col-sm-2 control-label">Fecha Registro: </label>
                                <div class="col-sm-4">
                                    <?php echo $fecha_tras;?>
                                </div>
                                <label for="idcliente" class="col-sm-2 control-label">Cliente: </label>
                                <div class="col-sm-4">
                                    <?php echo $nombre_cliente;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_empresa" class="col-sm-2 control-label">Empresa: </label>
                                <div class="col-sm-4">
                                    <?php echo $nombre_empresa;?>
                                </div>

                                <label for="idvehiculo" class="col-sm-2 control-label">Placa: </label>
                                <div class="col-sm-4">
                                    <?php echo $patente_vehiculo;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="datos" class="col-sm-2 control-label">Descripción: </label>
                                <div class="col-sm-4">
                                    <?php echo $datos;?>
                                </div>
                                <label for="status" class="col-sm-2 control-label">Estado: </label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" <?php if ($status==1){echo "selected";}?>>Terminado</option>
                                        <option value="2" <?php if ($status==2){echo "selected";}?>>Pendiente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagefile1" class="col-sm-2 control-label">Foto 1: </label>
                                <div class="col-sm-4">
                                    <input type="file" name="imagefile1" class="form-control" id="imagefile1" onchange="upload_foto1(<?php echo $trasser_id; ?>);">
                                </div>
                                <label for="imagefile2" class="col-sm-2 control-label">Foto 2: </label>
                                <div class="col-sm-4">
                                    <input type="file" name="imagefile2" class="form-control" id="imagefile2" onchange="upload_foto2(<?php echo $trasser_id; ?>);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagefile3" class="col-sm-2 control-label">Foto 3: </label>
                                <div class="col-sm-4">
                                <input type="file" name="imagefile3" class="form-control" id="imagefile3" onchange="upload_foto3(<?php echo $trasser_id; ?>);">
                                </div>
                                <label for="imagefile4" class="col-sm-2 control-label">Foto 4: </label>
                                <div class="col-sm-4">
                                    <input type="file" name="imagefile4" class="form-control" id="imagefile4" onchange="upload_foto4(<?php echo $trasser_id; ?>);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagefile5" class="col-sm-2 control-label">Foto 5: </label>
                                <div class="col-sm-4">
                                <input type="file" name="imagefile5" class="form-control" id="imagefile5" onchange="upload_foto5(<?php echo $trasser_id; ?>);">
                                </div>
                                <label for="imagefile6" class="col-sm-2 control-label">Foto 6: </label>
                                <div class="col-sm-4">
                                    <input type="file" name="imagefile6" class="form-control" id="imagefile6" onchange="upload_foto6(<?php echo $trasser_id; ?>);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagefile7" class="col-sm-2 control-label">Foto 7: </label>
                                <div class="col-sm-4">
                                <input type="file" name="imagefile7" class="form-control" id="imagefile7" onchange="upload_foto7(<?php echo $trasser_id; ?>);">
                                </div>
                                <label for="imagefile8" class="col-sm-2 control-label">Foto 8: </label>
                                <div class="col-sm-4">
                                    <input type="file" name="imagefile8" class="form-control" id="imagefile8" onchange="upload_foto8(<?php echo $trasser_id; ?>);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagefile9" class="col-sm-2 control-label">Foto 9: </label>
                                <div class="col-sm-4">
                                <input type="file" name="imagefile9" class="form-control" id="imagefile9" onchange="upload_foto9(<?php echo $trasser_id; ?>);">
                                </div>
                                <label for="imagefile10" class="col-sm-2 control-label">Foto 10: </label>
                                <div class="col-sm-4">
                                    <input type="file" name="imagefile10" class="form-control" id="imagefile10" onchange="upload_foto10(<?php echo $trasser_id; ?>);">
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
            <div class="col-md-12">
                <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Fotos del Servicio</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                    <input type="hidden"  id="id" name="id"  value="<?php echo $trasser_id;?>" >

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img">
                                                    <img class=" img-responsive" src="<?php echo  $foto1;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal1" style='cursor:pointer'>
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
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img2">
                                                    <img class=" img-responsive" src="<?php echo  $foto2;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal2" style='cursor:pointer'>
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
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img3">
                                                    <img class=" img-responsive" src="<?php echo  $foto3;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal3" style='cursor:pointer'>
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

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img4">
                                                    <img class=" img-responsive" src="<?php echo  $foto4;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal4" style='cursor:pointer'>
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
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img5">
                                                    <img class=" img-responsive" src="<?php echo  $foto5;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal5" style='cursor:pointer'>
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
                                                                <img src="<?php echo $foto5;?>" class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img6">
                                                    <img class=" img-responsive" src="<?php echo  $foto6;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal6" style='cursor:pointer'>
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
                                                                <img src="<?php echo $foto6;?>" class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img7">
                                                    <img class=" img-responsive" src="<?php echo  $foto7;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal7" style='cursor:pointer'>
                                                </div>
                                                <br>
                                                <div id="myModal7" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">&nbsp;</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo $foto7;?>" class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img8">
                                                    <img class=" img-responsive" src="<?php echo  $foto8;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal8" style='cursor:pointer'>
                                                </div>
                                                <br>
                                                <div id="myModal8" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">&nbsp;</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo $foto8;?>" class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img9">
                                                    <img class=" img-responsive" src="<?php echo  $foto9;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal9" style='cursor:pointer'>
                                                </div>
                                                <br>
                                                <div id="myModal9" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">&nbsp;</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo $foto9;?>" class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="box box-primary"><!-- Profile Image -->
                                            <div class="box-body box-profile">
                                                <div id="load_img10">
                                                    <img class=" img-responsive" src="<?php echo  $foto10;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModal10" style='cursor:pointer'>
                                                </div>
                                                <br>
                                                <div id="myModal10" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">&nbsp;</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo $foto10;?>" class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    function upload_foto1(trasser_id){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile1");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile1',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto1_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto2(trasser_id){
        $("#load_img2").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile2");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile2',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto2_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto3(trasser_id){
        $("#load_img3").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile3");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile3',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto3_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto4(trasser_id){
        $("#load_img4").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile4");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile4',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto4_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto5(trasser_id){
        $("#load_img5").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile5");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile5',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto5_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto6(trasser_id){
        $("#load_img6").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile6");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile6',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto6_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto7(trasser_id){
        $("#load_img7").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile7");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile7',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto7_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto8(trasser_id){
        $("#load_img8").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile8");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile8',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto8_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto9(trasser_id){
        $("#load_img9").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile9");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile9',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto9_trasser_ajax.php",        // Url to which the request is send
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
    function upload_foto10(trasser_id){
        $("#load_img10").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile10");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile10',file);
        data.append('id',trasser_id);

        $.ajax({
            url: "view/ajax/images/foto10_trasser_ajax.php",        // Url to which the request is send
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
            url: "view/ajax/agregar/actualizar_trasser.php",
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