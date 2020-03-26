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


            $cantidad=$rw['cantidad'];
            $descripcion=$rw['descripcion'];
            $precio=$rw['precio'];

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
