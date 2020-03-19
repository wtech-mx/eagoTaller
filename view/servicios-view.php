<?php
$active5="active";
    include "resources/header.php";
     if ($_SESSION['choque']==1){

        $mantenimiento = mysqli_query($con, "select * from mantenimiento");
        $gestoria = mysqli_query($con, "select * from gestoria");
        $estetica = mysqli_query($con, "select * from estetica");
        $traslados = mysqli_query($con, "select * from traslados");
        $verificacion = mysqli_query($con, "select * from estetica");

?>
        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <!--tiles start-->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=mantenimiento">
                        <div class="dashboard-tile detail tile-crimson">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($mantenimiento) ?>" data-speed="2500"> </h1>
                                <p>Mantenimiento</p>
                            </div>
                            <div class="icon"><i class="fa fa-cog"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=gestoria">
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
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=estetica">
                        <div class="dashboard-tile detail tile-steelblue">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($estetica) ?>" data-speed="2500"> </h1>
                                <p>Ecanica/Estetica</p>
                            </div>
                            <div class="icon"><i class="fa fa-code-fork"></i>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=traslados">
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
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=verificacion">
                        <div class="dashboard-tile detail tile-lategray">
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
                <!--dashboard charts and map end-->
            </section>
        </section>
        <!--main content end-->
    </section>
<?php
    include "resources/footer.php";
?>
<script src="assets/plugins/chartjs/Chart.min.js"></script> 
<!--Page Level JS-->
<script src="assets/plugins/countTo/jquery.countTo.js"></script>
<script src="assets/plugins/weather/js/skycons.js"></script>


<script src="assets/plugins/countTo/jquery.countTo.js"></script>
<script src="assets/plugins/weather/js/skycons.js"></script>
<!--Load these page level functions-->
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