<?php
    session_start();
    require_once ("../../../config/config.php");
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $id=intval($id);
        $sql="SELECT * FROM cotizacion WHERE id='$id'";
        $query=mysqli_query($con,$sql);
        $num=mysqli_num_rows($query);
        if ($num==1){

            $rw=mysqli_fetch_array($query);
                $nombre=$rw['nombre'];
                $correo=$rw['correo'];
                //$mensaje=$rw['mensaje'];

                $cantidad=$rw['cantidad'];
                $descripcion=$rw['descripcion'];
                $precio=$rw['precio'];

                $cantidad2=$rw['cantidad2'];
                $descripcion2=$rw['descripcion2'];
                $precio2=$rw['precio2'];

                $cantidad3=$rw['cantidad3'];
                $descripcion3=$rw['descripcion3'];
                $precio3=$rw['precio3'];

                $cantidad3=$rw['cantidad3'];
                $descripcion3=$rw['descripcion3'];
                $precio3=$rw['precio3'];

                $cantidad4=$rw['cantidad4'];
                $descripcion4=$rw['descripcion4'];
                $precio4=$rw['precio4'];

                $cantidad5=$rw['cantidad5'];
                $descripcion5=$rw['descripcion5'];
                $precio5=$rw['precio5'];  

                $idservicios=$rw['id'];
                $servicios=mysqli_query($con, "SELECT * FROM servicios WHERE id=$idservicios");
                $servicios_rw=mysqli_fetch_array($servicios);
                $nombre_servicios=$servicios_rw['nombre'];

                $idestados=$rw['id'];
                $estados=mysqli_query($con, "SELECT * FROM estados WHERE id=$idestados");
                $estados_rw=mysqli_fetch_array($estados);
            $nombre_estados=$estados_rw['nombre'];

        }
    }   
    else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">

<div class="form-group">
    <label for="nombre" class="col-sm-4 control-label">Nombre: </label>
    <div class="col-sm-8">
        <?php echo $nombre;?>
    </div>
</div>

<div class="form-group">
    <label for="correo" class="col-sm-4 control-label">Correo Electrónico: </label>
    <div class="col-sm-8">
       <?php echo $correo;?>
    </div>
</div>

<div class="form-group">
    <label for="cantidad" class="col-sm-4 control-label">cantidad: </label>
    <div class="col-sm-8">
        <?php echo $cantidad;?>
    </div>
</div>

<div class="form-group">
    <label for="descripcion" class="col-sm-4 control-label">descripcion</label>
    <div class="col-sm-8">
        <?php echo $descripcion;?>
    </div>
</div>

<div class="form-group">
    <label for="precio" class="col-sm-4 control-label">precio: </label>
    <div class="col-sm-8">
        <?php echo $precio;?>
    </div>
</div>

<div class="form-group">
    <label for="empresa" class="col-sm-4 control-label">servicio: </label>
    <div class="col-sm-8">
       <?php echo $nombre_servicios;?>
    </div>
</div>

<div class="form-group">
    <label for="manejo" class="col-sm-4 control-label">entidad </label>
    <div class="col-sm-8">
        <?php echo $nombre_estados;?>
    </div>
</div>

</div>
