<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id_cliente"])){//codigo para eliminar
	$id=$_REQUEST["id_cliente"];
	$id=intval($id);
	if($delete=mysqli_query($con, "DELETE FROM cliente WHERE id_cliente='$id'")){
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
	$tables="cliente";
	$campos="*";
	$sWhere=" nombre LIKE '%".$query."%'";
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
	$reload = '../datCliente-view.php';
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	if (isset($_REQUEST["id_cliente"])){
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
                <th>Empresa</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo Electrónico</th>
                <th>Edad</th>
                <th>acciones</th>
            </tr>
        </thead>
        <?php
			$finales=0;
			while($row = mysqli_fetch_array($query)){
				$id=$row['id_cliente'];
				$nombre=$row['nombre'];
				$apellido=$row['apellido'];
				$telefono=$row['telefono'];
				$correo=$row['correo'];
				$edad=$row['edad'];

				$idempresa=$row['id_empresa'];
				$empresas=mysqli_query($con, "SELECT * FROM empresa WHERE id_empresa=$idempresa");
				$empresa_rw=mysqli_fetch_array($empresas);
				$nombre_empresa=$empresa_rw['nombre'];

				/*$kind=$row['kind'];*/

			$finales++;
		?>
        <tbody>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $nombre_empresa ?></td>
                <td><?php echo $nombre." ".$apellido ?></td>
                <td><?php echo $telefono ?></td>
                <td><?php echo $correo ?></td>
                <td><?php echo $edad ?></td>
                <td class="text-right">


                    <button type="button" class="btn btn-warning btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $id;?>');"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Selecciona para editar los datos del cliente"></i></button>

                    <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del cliente"></i></button>

                   <!-- <button type="button" class="btn btn-danger btn-square btn-xs" onclick="eliminar('<?php echo $id;?>')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="bottom" title="Selecciona para eliminar al cliente"></i></button>-->

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

	<script>
		$(function(){
			$('[data-toggle="tooltip"]').tooltip();
		})
	</script>