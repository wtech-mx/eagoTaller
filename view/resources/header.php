<?php
    if (!isset($_SESSION['user_id'])&& $_SESSION['user_id']==null) {
        header("location: ./?view=index");
    }
    $id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from empleado where id=$id");
    while ($row=mysqli_fetch_array($query)) {
        $dni_empleado=$row['dni'];
        $imagen_empleado=$row['imagen'];
        $nombre_empleado=$row['nombre'];
        $apellido_empleado=$row['apellido'];
        $username_empleado=$row['username'];
        $email_empleado=$row['email'];
        $domicilio_empleado=$row['domicilio'];
        $localidad_empleado=$row['localidad'];
        $telefono_empleado=$row['telefono'];
        $celular_empleado=$row['celular'];
        $registro_empleado=$row['registro'];
        $status_empleado=$row['status'];
        $created_at_empleado=$row['created_at'];
    }
    $configuracion=mysqli_query($con, "select * from configuracion");
    $rw=mysqli_fetch_array($configuracion);
    $nombre_empresa=$rw['nombre'];
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $nombre_empresa; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="assets/plugins/todo/css/todos.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="assets/plugins/morris/css/morris.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Feature detection -->
    <script src="assets/js/modernizr-2.6.2.min.js"></script>

    <!-- <link rel="stylesheet" href="assets/plugins/selectpicker/bootstrap-select.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/plugins/select2/css/select2.css"> -->
</head>

<body>
    <section id="container">
        <header id="header">

            <!--logo start-->
            <div class="brand">
                <a href="./?view=dashboard" ><span><?php echo $nombre_empresa; ?></span></a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="user-nav">
                <ul>
                    <li class="profile-photo">
                        <img src="<?php echo $imagen_empleado ?>" height="40px" width="40px" alt="" class="img-circle">
                    </li>
                    <li class="dropdown settings">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <?php echo $nombre_empleado." ".$apellido_empleado; ?> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li>
                                <a href="./?view=perfil"><i class="fa fa-user"></i> Mi Perfil</a>
                            </li>
                            <li>
                                <a href="./?view=logout"><i class="fa fa-power-off"></i> Salir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <!--sidebar left start-->
        <aside class="sidebar">
            <div id="leftside-navigation" class="nano">

                <ul class="nano-content">

                    <?php if ($_SESSION['dashboard']==1) { ?>
                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="./?view=dashboard"><i class="fa fa-tachometer"></i>Inicio</a>
                    </li>
                    <?php } ?>

                    
                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="./?view=vehiculos"><i class="fa fa-truck"></i><span>Vehiculo</span></a>
                        <ul>
                            <li><a href="./?view=taller"><i class="fa fa-cog"></i>Taller</li></a>
                            <li><a href="./?view=seguros"><i class="fa fa-key"></i>Seguro</li></a>
                        </ul>
                    </li>
                  
                    
                    <li class="<?php if(isset($active3)){echo $active3;}?>">
                        <a href="./?view=datCliente"><i class="fa fa-mobile"></i>Datos Cliente</a>
                    </li>

                    
                    <?php if ($_SESSION['empresa']==1) { ?>
                    <li class="<?php if(isset($active4)){echo $active4;}?>">
                        <a href="./?view=empresas"><i class="fa fa-building-o"></i><span>Empresas</span></a>
                    </li>
                    <?php } ?>
                    
                    <li class="<?php if(isset($active5)){echo $active5;}?>">
                        <a href="./?view=servicios"><i class="fa fa-wrench" data-toggle="dropdown"></i><span>Servicios</span></a>
                        <ul>
                            <li><a href="./?view=mantenimiento"><i class="fa fa-cog"></i>Mantenimiento</li></a>                       
                            <li><a href="./?view=estetica"><i class="fa fa-code-fork"></i><span>Mecanica/Estética</span></a>
                            </li>                       
                            <li><a href="./?view=gestoria"><i class="fa fa-user"></i>Gestoría</li></a>
                            <li><a href="./?view=verificacion"><i class="fa fa-search"></i>Verificación</li></a>
                            <li><a href="./?view=traslados"><i class="fa fa-truck"></i>Traslados</li></a>
                        </ul>
                    </li>
                    
                    <li class="<?php if(isset($active30)){echo $active30;}?>">
                        <a href="./?view=Documentacion"><i class="fa fa-file-text"></i><span>Documentación</span></a>
                    </li>

                    <li class="<?php if(isset($active30)){echo $active30;}?>">
                        <a href="./?view=blog"><i class="fa fa-pencil"></i><span>Noticias y Tips</span></a>
                    </li>

                    <li class="<?php if(isset($active30)){echo $active30;}?>">
                        <a href="./?view=slide"><i class="fa fa-picture-o"></i><span>Slide</span></a>
                    </li>

<!--                  <?php if ($_SESSION['slide']==1) { ?>
                    <li class="<?php if(isset($active13)){echo $active13;}?>">
                        <a href="./?view=slide"><i class="fa fa-picture-o"></i><span>slide</span></a>
                    </li>
                    <?php } ?> -->
                    
                    <?php if ($_SESSION['empleados']==1) { ?>
                    <li class="<?php if(isset($active8)){echo $active8;}?>">
                        <a href="./?view=empleados"><i class="fa fa-indent"></i><span>Empleados</span></a>
                    </li>
                    <?php } ?>

                    <?php if ($_SESSION['admin']==1) { ?>
                     <li class="<?php if(isset($active6)){echo $active6;}?>">
                        <a href="./?view=admin"><i class="fa fa-road"></i><span>Gestor Administrativo</span></a>
                        <ul>                                                  
                            <li><a href="./?view=esteadmin"><i class="fa fa-code-fork"></i><span>Mecanica/Estética</span></a>
                            </li>                       
                            <li><a href="./?view=gesadmin"><i class="fa fa-user"></i>Gestoría</li></a>
                            <li><a href="./?view=veriadmin"><i class="fa fa-search"></i>Verificación</li></a>
                            <li><a href="./?view=trasadmin"><i class="fa fa-truck"></i>Traslados</li></a>
                        </ul>
                    </li>                     
                    <?php } ?>

                    <?php if ($_SESSION['seguro']==1) { ?>
                    <!--<li class="<?php if(isset($active5)){echo $active5;}?>">
                        <a href="./?view=seguros"><i class="fa fa-lock"></i><span>Seguro</span></a>
                    </li>-->                   
                    <?php } ?>

                    

                    <?php if ($_SESSION['tarjeta']==1) { ?>
                    <!--<li class="<?php if(isset($active9)){echo $active9;}?>">
                        <a href="./?view=tarjetas"><i class="fa fa-credit-card"></i><span>Tarjeta</span></a>
                    </li>-->
                    <?php } ?>

                    <?php if ($_SESSION['reparaciones']==1) { ?>
                    <!--<li class="<?php if(isset($active10)){echo $active10;}?>">
                        <a href="./?view=reparaciones"><i class="fa fa-gavel"></i><span>Reparaciones</span></a>
                    </li>-->
                    <?php } ?>

                    <?php if ($_SESSION['configuracion']==1) { ?>
                    <li class="<?php if(isset($active12)){echo $active12;}?>">
                        <a href="./?view=configuracion"><i class="fa fa-cog"></i><span>Configuración</span></a>
                    </li>
                    <li >
                        <a href="http://eago.com.mx/eago-pag/index.php#" target="blank">
                            <i class="fa fa-circle"></i>
                            <span>Visita EAGO</span></a>
                    </li>
                
                    <?php } ?>
                </ul>
            </div>
        </aside>
        <!--sidebar left end-->

        <!--SWEEALERTS-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>