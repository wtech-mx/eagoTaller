<?php
    session_start();
    require_once ("../../../config/config.php");
     if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="SELECT * FROM estetica WHERE id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){
            $rw=mysqli_fetch_array($query);

            $fecha_ges=$rw['fecha_carga'];

            $idcliente=$rw['id_cliente'];
            $clientes=mysqli_query($con, "SELECT * FROM cliente WHERE id_cliente=$idcliente");
            $cliente_rw=mysqli_fetch_array($clientes);
            $nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

            $idempresa=$rw['id_empresa'];
            $empresas=mysqli_query($con, "SELECT * FROM empresa WHERE id_empresa=$idempresa");
            $empresa_rw=mysqli_fetch_array($empresas);
            $nombre_empresa=$empresa_rw['nombre'];

            $idvehiculo=$rw['idvehiculo'];
            $vehiculos=mysqli_query($con, "SELECT * FROM vehiculo WHERE id=$idvehiculo");
            $vehiculo_rw=mysqli_fetch_array($vehiculos);
            $patente_vehiculo=$vehiculo_rw['patente'];

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

            if ($status==1){
                $lbl_status="Terminado";
                $lbl_class='label label-success';
            }else {
                $lbl_status="Pendiente";
                $lbl_class='label label-danger';
            }
    }
    }
    else{exit;}
?>
                                <input type="hidden" value="<?php echo $id;?>" name="id" id="id">
                                <div class="form-group">
                                    <label for="idfecha_ges" class="col-sm-2 control-label">Fecha Registro: </label>
                                    <div class="col-sm-4">
                                        <?php echo $fecha_ges;?>
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
                                         <?php echo $lbl_status;?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="box box-primary"><!-- Profile Image -->
                                        <div class="box-body box-profile">
                                            <div id="load_img">
                                                <img class=" img-responsive" src="<?php echo  $foto1;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModalq" style='cursor:pointer'>
                                            </div>
                                           <br>
                                            <div id="myModalq" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
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