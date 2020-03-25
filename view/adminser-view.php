<?php 
    $active13="active";
    include "resources/header.php";
    
    if ($_SESSION['adminser']==1){

        $mantenimiento = mysqli_query($con, "select * from mantenimiento");
        $gestoria = mysqli_query($con, "select * from gestoria");
        $estetica = mysqli_query($con, "select * from estetica");
        $traslados = mysqli_query($con, "select * from traslados");
        $verificacion = mysqli_query($con, "select * from estetica");
?>
  
        <section class="main-content-wrapper">

            <section id="main-content">

                <h1 class="text-center mb-3 p-5"><strong>Comprobacion de servicio</strong></h1>
                <!--tiles start-->
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <a href="./?view=manser" data-toggle="tooltip" data-placement="top" title="Selecciona el servicio de mantenimiento para poder crear, editar y/o elimincar un servicio ">
                        <div class="dashboard-tile detail tile-crimson">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($mantenimiento) ?>" data-speed="2500"> </h1>
                                <p>Mantenimiento</p>
                            </div>
                            <div class="icon"><i class="fa fa-cog"></i>
                            </div>
                        </div>
                    </div> 

                    <div class="col-md-6 col-sm-6">
                        <a href="./?view=gesser" data-toggle="tooltip" data-placement="top" title="Selecciona el servicio de Gestoria para poder crear, editar y/o elimincar un servicio ">
                        <div class="dashboard-tile detail tile-gold">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($gestoria) ?>" data-speed="2500"> </h1>
                                <p>Gestoria</p>
                            </div>
                            <div class="icon"><i class="fa fa-user"></i>
                            </div>
                        </div>
                    </a>
                    </div>

                   <div class="col-md-6 col-sm-6">
                        <a href="./?view=esteser" data-toggle="tooltip" data-placement="top" title="Selecciona el servicio de Mecanica/Estetica para poder crear, editar y/o elimincar un servicio ">
                        <div class="dashboard-tile detail tile-steelblue">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($estetica) ?>" data-speed="2500"> </h1>
                                <p>Mecanica/Estetica</p>
                            </div>
                            <div class="icon"><i class="fa fa-code-fork"></i>
                            </div>
                        </div>
                    </a>
                    </div>

                   <div class="col-md-6 col-sm-6">
                        <a href="./?view=trasser" data-toggle="tooltip" data-placement="top" title="Selecciona el servicio de Traslados para poder crear, editar y/o elimincar un servicio ">
                        <div class="dashboard-tile detail tile-teal">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($traslados) ?>" data-speed="2500"> </h1>
                                <p>Traslados</p>
                            </div>
                            <div class="icon"><i class="fa fa-truck"></i>
                            </div>
                        </div>
                    </a>
                    </div>               

                    <div class="col-md-12 col-sm-6">
                        <a href="./?view=veriser" data-toggle="tooltip" data-placement="bottom" title="Selecciona el servicio de Verificacion para poder crear, editar y/o elimincar un servicio ">
                        <div class="dashboard-tile detail tile-purple">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($verificacion) ?>" data-speed="2500"> </h1>
                                <p>Verificacion</p>
                            </div>
                            <div class="icon"><i class="fa fa-search"></i>
                            </div>
                        </div>
                    </a>
                    </div>

                </div>
                <!--tiles end-->
            
                <!--dashboard charts and map end-->
            </section>
        </section>

<script src="assets/plugins/chartjs/Chart.min.js"></script> 
<!--Page Level JS-->
<script src="assets/plugins/countTo/jquery.countTo.js"></script>
<script src="assets/plugins/weather/js/skycons.js"></script>


<script src="assets/plugins/countTo/jquery.countTo.js"></script>
<script src="assets/plugins/weather/js/skycons.js"></script>



<script>
    $(document).ready(function() {
        app.timer();
        app.weather();
    });
</script>

<?php 
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush(); 
?>

        <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>