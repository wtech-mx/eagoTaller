<?php
    $active6="active";
    include "resources/header.php";
    if ($_SESSION['seguro']==1){

    $eliminar=mysqli_query($con, "DELETE FROM documentacion WHERE idvehiculo=0");
?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class="active">Documentos</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Documentos</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Fecha de Carga" id='q' onkeyup="load(1);">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick='load(1);'><i class='fa fa-search'></i></button>
                      </span>
                    </div><!-- /input-group -->
                </div>

                <div class="col-xs-3"></div>
                <div class="col-xs-1">
                    <div id="loader" class="text-center"></div>
                </div>

               <div class="col-md-6">
                    <div class="btn-group ">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class='fa fa-wrench'></i>
                            Agregar Servicio <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li class='active'><a href="./?view=mantenimiento">Mantenimiento</a></li>
                            <li><a href="./?view=gestoria">Gestoria</a></li>
                            <li><a href="./?view=estetica">Mecanica/Estética</a></li>
                            <li><a href="./?view=traslados">Traslados</a></li>
                            <li><a href="./?view=verificacion">Verificacion</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-offset-10">
                    <!-- modals -->
                        <?php
                           // include "modals/agregar/agregar_sector.php";
                           // include "modals/editar/editar_sector.php";
                           include "modals/mostrar/mostrar_documentacion.php";
                        ?>
                    <!-- /end modals -->
                    <a class="btn btn-primary" href="./?view=nuevo_documentacion"><i class='fa fa-plus'></i> Nuevo</a>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Mostrar <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li class='active' onclick='per_page(15);' id='15'><a href="#">15</a></li>
                            <li  onclick='per_page(25);' id='25'><a href="#">25</a></li>
                            <li onclick='per_page(50);' id='50'><a href="#">50</a></li>
                            <li onclick='per_page(100);' id='100'><a href="#">100</a></li>
                            <li onclick='per_page(1000000);' id='1000000'><a href="#">Todos</a></li>
                        </ul>
                    </div>
                    <input type='hidden' id='per_page' value='15'>
                </div>
            </div>



            <div id="resultados_ajax"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos de los Documentos</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="outer_div"></div><!-- Datos ajax Final -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section><!--main content end-->
<?php
    include "resources/footer.php";
?>

<script>
    $(function() {
        load(1);
    });

    function load(page){
        var query=$("#q").val();
        var per_page=$("#per_page").val();
        var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
        $("#loader").fadeIn('slow');
        $.ajax({
            url:'view/ajax/documentacion_ajax.php',
            data: parametros,
             beforeSend: function(objeto){
            $("#loader").html("<img src='./assets/img/ajax-loader.gif'>");
          },
            success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                $("#loader").html("");
            }
        })
    }

    function per_page(valor){
        $("#per_page").val(valor);
        load(1);
        $('.dropdown-menu li' ).removeClass( "active" );
        $("#"+valor).addClass( "active" );
    }
</script>
<script>
    function eliminar(id){
        if(confirm('Esta acción  eliminará de forma permanente al documento \n\n Desea continuar?')){
            var page=1;
            var query=$("#q").val();
            var per_page=$("#per_page").val();
            var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};

            $.ajax({
                url:'view/ajax/documentacion_ajax.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader").html("<img src='./assets/img/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $("#loader").html("");
                    window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();});}, 5000);
                }
            })
        }
    }

    function mostrar(id){
        var parametros = {"action":"ajax","id":id};
        $.ajax({
                url:'view/modals/mostrar/documentacion.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader3").html("<img src='./assets/img/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div3").html(data).fadeIn('slow');
                    $("#loader3").html("");
                }
            })
    }

    function enviar(id){
        swal({
          title: "¿Deseas enviar el documento?",
          text: "Seran enviado los datos proporcionados ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Mensaje enviado correctamente", {
              icon: "success",
            });
        var parametros = {"action":"ajax","id":id};
        $.ajax({
                url:'view/modals/mostrar/correo-documentacion.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader4").html("<img src='./assets/img/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div4").html(data).fadeIn('slow');
                    $("#loader4").html("");
                }
            })
          } else {
            swal("Se ha cancelado el envio del documento");
          }
        });
    }
</script>
<?php
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush();
?>