<?php 
    $active13="active";
    include "resources/header.php";
    
    if ($_SESSION['adminser']==1){
?>
  
<section class="main-content-wrapper">
            <section id="main-content">

            <div class="row">
                <div class="col-md-12">                        
                    <h1 class="h1">Comprobación de servicios</h1>
                </div>
            </div>
                <!--tiles start-->
                <div class="row">
                   <a href="./?view=esteser">
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-turquoise">
                            <div class="content">
                                
                                <p>Mecanica/Estética</p>
                            </div>
                           <div class="icon"><i class="fa fa-code-fork"></i>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="./?view=gesser">
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-blue">
                            <div class="content">
                                
                                <p>Gestoria</p>
                            </div>
                            <div class="icon"><i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="./?view=veriser">
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-purple">
                            <div class="content">
                                
                                <p>Verificación</p>
                            </div>
                            <div class="icon"><i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="./?view=trasser">
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">
                                
                                <p>Traslados</p>
                            </div>
                            <div class="icon"><i class="fa fa-truck"></i>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="./?view=manser">
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-black">
                            <div class="content">                                
                                <p>Mantenimiento</p>
                            </div>
                            <div class="icon"><i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    </a>
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