<?php
    $active1="active";  
    include "resources/header.php";

    if ($_SESSION['dashboard']==1){

        $empleados = mysqli_query($con, "SELECT * FROM empleado");
        $cliente = mysqli_query($con, "SELECT * FROM cliente");
        $vehiculos = mysqli_query($con, "SELECT * FROM vehiculo");

        $mantenimiento = mysqli_query($con, "SELECT * FROM mantenimiento");
        $gestoria = mysqli_query($con, "SELECT * FROM gestoria");
        $estetica = mysqli_query($con, "SELECT * FROM estetica");
        $traslados = mysqli_query($con, "SELECT * FROM traslados");
        $verificacion = mysqli_query($con, "SELECT * FROM estetica");

        function suma_reparaciones($month){
            global $con;
            $year=date('Y');
            $sql="select count(id) as id from reparaciones where year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }
        function suma_choques($month){
            global $con;
            $year=date('Y');
            $sql="select count(id) as id from choque where year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }

?>
        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <!--tiles start-->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=empleados">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($empleados) ?>" data-speed="2500"> </h1>
                                <p>Empleados</p>
                            </div>
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=datCliente">
                        <div class="dashboard-tile detail tile-turquoise">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($cliente) ?>" data-speed="2500"> </h1>
                                <p>Clientes</p>
                            </div>
                            <div class="icon"><i class="fa fa-indent"></i>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=vehiculos">
                        <div class="dashboard-tile detail tile-purple">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($vehiculos) ?>" data-speed="2500"> </h1>
                                <p>Vehiculos</p>
                            </div>
                            <div class="icon"><i class="fa fa-truck"></i>
                            </div>
                        </div>
                    </a>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <a href="./?view=servicios">
                        <div class="dashboard-tile detail tile-blue">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($mantenimiento) + mysqli_num_rows($gestoria) + mysqli_num_rows($estetica) + mysqli_num_rows($traslados) + mysqli_num_rows($verificacion) ?>" data-speed="2500"></h1>
                                <p>Servicios</p>
                            </div>
                            <div class="icon"><i class="fa fa-building-o"></i>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <!--tiles end-->
                <!--dashboard charts and map start-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos Estadisticos</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>

                            <div class="panel-body text-center">
                                <p class="text-center">
                                    <strong><span class="text-muted">Taller</span> & <span class="text-info">Mecanico</span> <b><?php echo date('Y');?></b></strong>
                                </p>
                                <canvas id="bar" height="300" width="1050px"></canvas><!-- datos estadisticos finales -->
                            </div>
                        </div>
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
<script>
var barChartData = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    datasets : [
        {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            data : [<?php echo suma_reparaciones(1);?>, <?php echo suma_reparaciones(2);?>, <?php echo suma_reparaciones(3);?>, <?php echo suma_reparaciones(4);?>, <?php echo suma_reparaciones(5);?>, <?php echo suma_reparaciones(6);?>, <?php echo suma_reparaciones(7);?>,<?php echo suma_reparaciones(8);?>,<?php echo suma_reparaciones(9);?>,<?php echo suma_reparaciones(10);?>,<?php echo suma_reparaciones(11);?>,<?php echo suma_reparaciones(12);?>]
        },
        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            data : [<?php echo suma_choques(1);?>, <?php echo suma_choques(2);?>, <?php echo suma_choques(3);?>, <?php echo suma_choques(4);?>, <?php echo suma_choques(5);?>, <?php echo suma_choques(6);?>, <?php echo suma_choques(7);?>,<?php echo suma_choques(8);?>,<?php echo suma_choques(9);?>,<?php echo suma_choques(10);?>,<?php echo suma_choques(11);?>,<?php echo suma_choques(12);?>]
        }
    ]
    
}
var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
</script>

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