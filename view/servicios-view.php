<?php 
    $active5="active";
    include "resources/header.php";
     if ($_SESSION['choque']==1){
?>
   
<section class="main-content-wrapper">
            <section id="main-content">

            <div class="row">
                <div class="col-md-12">                        
                    <h1 class="h1">Servicios</h1>
                </div>
            </div>

                <!--tiles start-->
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">                              
                                <p >Mantenimiento</p>
                            </div>
                            <div class="icon"> <a href="./?view=mantenimiento"><i class="fa fa-cog"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-turquoise">
                            <div class="content">
                                
                                <p>Mecanica/Estética</p>
                            </div>
                            <a href="./?view=estetica"><div class="icon"><i class="fa fa-code-fork"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-blue">
                            <div class="content">
                                
                                <p>Gestoria</p>
                            </div>
                            <a href="./?view=gestoria"><div class="icon"><i class="fa fa-user"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-purple">
                            <div class="content">
                                
                                <p>Verificación</p>
                            </div>
                            <a href="./?view=verificacion"><div class="icon"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-white">
                            <div class="content">
                                
                                <p>Traslados</p>
                            </div>
                            <a href="./?view=traslados"><div class="icon"><i class="fa fa-truck"></i></a>
                            </div>
                        </div>
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




<?php     
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush(); 
?>