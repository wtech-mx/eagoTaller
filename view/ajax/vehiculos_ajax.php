<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id"])){//codigo para eliminar
	$id=$_REQUEST["id"];
	$id=intval($id);
	if($delete=mysqli_query($con, "DELETE FROM vehiculo WHERE id='$id'")){
		$aviso="Bien hecho!";
		$msj="Datos eliminados satisfactoriamente.";
		$classM="alert alert-success";
		$times="&times;";
	}else{
		$aviso="Aviso!";
		$msj="Error al eliminar los datos ".mysqli_error($con);
		$classM="alert alert-danger";
		$times="&times;";
	}
}

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables="vehiculo";
	$campos="*";
	$sWhere=" patente LIKE '%".$query."%'" ;
	$sWhere2=" patente LIKE '%".$query."%' OR nro_chasis LIKE '%".$query."%'" ;
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere2");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$reload = './vehiculos-view.php';
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	if (isset($_REQUEST["id"])){
?>
		<div class="<?php echo $classM;?>">
			<button type="button" class="close" data-dismiss="alert"><?php echo $times;?></button>
			<strong><?php echo $aviso?> </strong>
			<?php echo $msj;?>
		</div>
<?php
	}
	if ($numrows>0){
?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Cliente</th>
                <th>Imagen</th>
                <th>Placas</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Empresa</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php
			$finales=0;
			while($row = mysqli_fetch_array($query)){
				$id=$row['id'];
				$idcliente=$row['id_cliente'];
				$clientes=mysqli_query($con, "SELECT * FROM cliente WHERE id_cliente=$idcliente");
				$cliente_rw=mysqli_fetch_array($clientes);
				$nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

				$idempresa=$row['id_empresa'];
				$empresas=mysqli_query($con, "SELECT * FROM empresa WHERE id_empresa=$idempresa");
				$empresa_rw=mysqli_fetch_array($empresas);
				$nombre_empresa=$empresa_rw['nombre'];

				$vehiculo_code=$row['vehiculo_code'];
				$patente=$row['patente'];
				$marca=$row['marca'];
				$modelo=$row['modelo'];
				$foto1=$row['foto1'];
				$created_at=$row['fecha_carga'];
				$color=$row['color'];
				$estado=$row['estado'];

				list($date,$hora)=explode(" ",$created_at);
				list($Y,$m,$d)=explode("-",$date);
				$fecha=$d."-".$m."-".$Y;

				if ($estado==1){
					$lbl_status="Activo";
					$lbl_class='label label-success';
				}else {
					$lbl_status="Inactivo";
					$lbl_class='label label-danger';
				}

				$finales++;

		?>
        <tbody>
            <tr>
                <td><?php echo $vehiculo_code ?></td>
                <td><?php echo $nombre_cliente ?></td>
                <td class='text-center'>
                	<img src="<?php echo $foto1;?>" alt="<?php echo $patente;?>" class='img-rounded' width="60">
                </td>
                <td><?php echo $patente ?></td>
                <td><?php echo $marca ?></td>
                <td><?php echo $modelo ?></td>

                <td><input disabled class="form-control" type="color" value="<?php echo $color ?>" id="example-color-input"><?php echo $color ?></td>
                <td><?php echo $nombre_empresa ?></td>
                <td><span class="<?php echo $lbl_class;?>"><?php echo $lbl_status;?></span></td>
                <td><?php echo $fecha ?></td>
                <td class="text-right">

					<a style="color: white;" class="btn btn-warning btn-square btn-xs" href="./?view=editar_vehiculo&id=<?php echo $id;?>"><i class='fa fa-edit'></i></a>

                  <!--  <button type="button" class="btn btn-danger btn-square btn-xs" onclick="eliminar('<?php echo $id;?>')"><i class="fa fa-trash-o"></i></button>-->

                    <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $id;?>')"><i class="fa fa-eye"></i></button>

                </td>
            </tr>
        </tbody>
        <?php }?>
        <tfoot>
            <tr>
				<td colspan='10'>
					<?php
						$inicios=$offset+1;
						$finales+=$inicios -1;
						echo "Mostrando $inicios al $finales de $numrows registros";
						echo paginate($reload, $page, $total_pages, $adjacents);
					?>
				</td>
			</tr>
		</tfoot>
    </table>
<?php
	}else{
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.</div>';
	}
}
?>