<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id"])){//codigo para eliminar 
	$id=$_REQUEST["id"];
	$id=intval($id);
	if($delete=mysqli_query($con, "DELETE FROM traslados WHERE id='$id'")){
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
	$tables="traslados";
	$campos="*";
	$sWhere=" fecha_tras LIKE '%".$query."%'";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$reload = './trasser-view.php';
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
                <th>Fecha de Servicio</th>
                <th>Empresa</th>
                <th>Cliente</th>
                <th>Placa</th>
                <th>Datos</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <?php 
			$finales=0;
			while($row = mysqli_fetch_array($query)){	
				$id=$row['id'];

				$fecha_tras=$row['fecha_tras'];

				$idcliente=$row['id_cliente'];
				$clientes=mysqli_query($con, "select * from cliente where id_cliente=$idcliente");
				$cliente_rw=mysqli_fetch_array($clientes);
				$nombre_cliente=$cliente_rw['nombre']." ".$cliente_rw['apellido'];

				$idempresa=$row['id_empresa'];
				$empresas=mysqli_query($con, "select * from empresa where id_empresa=$idempresa");
				$empresa_rw=mysqli_fetch_array($empresas);
				$nombre_empresa=$empresa_rw['nombre'];

				$idvehiculo=$row['idvehiculo'];
				$vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo");
				$vehiculo_rw=mysqli_fetch_array($vehiculos);
				$patente_vehiculo=$vehiculo_rw['patente'];

				$created_at=$row['fecha_carga'];
				list($date,$hora)=explode(" ",$created_at);
				list($Y,$m,$d)=explode("-",$date);
				$fecha=$d."-".$m."-".$Y;

				$datos=$row['datos'];
                $status=$row['status'];

                if ($status==1){              	
					$lbl_status="Terminado";
					$lbl_class='label label-success';					
				}else {
					$lbl_status="Pendiente";
					$lbl_class='label label-danger';
				}
				
				$finales++;
			
		?>	
        <tbody>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $fecha_tras ?></td>
                <td><?php echo $nombre_empresa ?></td>
                <td><?php echo $nombre_cliente ?></td>
                <td><?php echo $patente_vehiculo ?></td>
                <td><?php echo $datos ?></td>
                <td><?php echo $fecha ?></td>
                <td><span class="<?php echo $lbl_class;?>"><?php echo $lbl_status;?></span></td>
                <td class="text-right">

                    <?php 
                	if ($status==1) {
                	?>
                		<a style="color: white;" class="btn btn-warning btn-square btn-xs" href=""  disabled><i class='fa fa-edit'></i></a>
                	<?php 
                	}else{
                	?>
                		<a style="color: white;" class="btn btn-warning btn-square btn-xs" href="./?view=editar_trasser&id=<?php echo $id;?>"><i class='fa fa-edit'></i></a>
                	<?php
                	}
                	?>

                   <!-- <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $id;?>')"><i class="fa fa-eye"></i></button>-->
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