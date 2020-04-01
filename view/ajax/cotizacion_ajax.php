<?php
include("is_logged.php"); //Archivo comprueba si el usuario esta logueado
/* Connect To Database*/
require_once("../../config/config.php");
if (isset($_REQUEST["id"])) { //codigo para eliminar 
	$id = $_REQUEST["id"];
	$id = intval($id);
	if ($delete = mysqli_query($con, "DELETE FROM cotizacion WHERE id='$id'")) {
		$aviso = "Bien hecho!";
		$msj = "Datos eliminados satisfactoriamente.";
		$classM = "alert alert-success";
		$times = "&times;";
	} else {
		$aviso = "Aviso!";
		$msj = "Error al eliminar los datos " . mysqli_error($con);
		$classM = "alert alert-danger";
		$times = "&times;";
	}
}

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables = "cotizacion";
	$campos = "*";
	$sWhere = " nombre LIKE '%" . $query . "%'";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row = mysqli_fetch_array($count_query)) {
		$numrows = $row['numrows'];
	} else {
		echo mysqli_error($con);
	}
	$total_pages = ceil($numrows / $per_page);
	$reload = './cotizacion-view.php';
	//main query to fetch the data
	$query = mysqli_query($con, "SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	if (isset($_REQUEST["id"])) {
?>
		<div class="<?php echo $classM; ?>">
			<button type="button" class="close" data-dismiss="alert"><?php echo $times; ?></button>
			<strong><?php echo $aviso ?> </strong>
			<?php echo $msj; ?>
		</div>
	<?php
	}
	if ($numrows > 0) {
	?>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#ID</th>
					<th>Nombre /Empresa</th>
					<th>Correo Electrónico</th>
					<th>Cantidad</th>
					<th>Servicio</th>
					<th>Entidad</th>
					<th>Detalles</th>
					<th>Precio</th>
					<th>Fecha</th>
					<th></th>
				</tr>
			</thead>
			<?php
			$finales = 0;
			while ($row = mysqli_fetch_array($query)) {
				$id = $row['id'];
				$nombre = $row['nombre'];
				$correo = $row['correo'];
				$fecha_carga = $row['fecha_carga'];
				//$mensaje=$row['mensaje'];

				$cantidad = $row['cantidad'];
				$descripcion = $row['descripcion'];
				$precio = $row['precio'];

				$cantidad2 = $row['cantidad2'];
				$descripcion2 = $row['descripcion2'];
				$precio2 = $row['precio2'];

				$cantidad3 = $row['cantidad3'];
				$descripcion3 = $row['descripcion3'];
				$precio3 = $row['precio3'];

				$cantidad3 = $row['cantidad3'];
				$descripcion3 = $row['descripcion3'];
				$precio3 = $row['precio3'];

				$cantidad4 = $row['cantidad4'];
				$descripcion4 = $row['descripcion4'];
				$precio4 = $row['precio4'];

				$cantidad5 = $row['cantidad5'];
				$descripcion5 = $row['descripcion5'];
				$precio5 = $row['precio5'];

				$idservicios = $row['id'];
				$servicios = mysqli_query($con, "SELECT * FROM servicios WHERE id=$idservicios");
				$servicios_rw = mysqli_fetch_array($servicios);
				$nombre_servicios = $servicios_rw['nombre'];

				$idestados = $row['id'];
				$estados = mysqli_query($con, "SELECT * FROM estados WHERE id=$idestados");
				$estados_rw = mysqli_fetch_array($estados);
				$nombre_estados = $estados_rw['nombre'];

			?>
				<tbody>
					<tr>
						<td><?php echo $id ?></td>
						<td><?php echo $nombre ?></td>
						<td><?php echo $correo ?></td>
						<td><?php echo $cantidad ?></td>
						<td><?php echo $nombre_servicios ?></td>
						<td><?php echo $nombre_estados ?></td>
						<td><?php echo $descripcion ?></td>
						<td>$<?php echo $precio ?></td>
						<td><?php echo $fecha_carga ?></td>
						<td class="text-right">

							<button type="button" class="btn btn-warning btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $id; ?>');"><i class="fa fa-edit"></i></button>

							<!-- <button type="button" class="btn btn-danger btn-square btn-xs" onclick="eliminar('<?php echo $id; ?>')"><i class="fa fa-trash-o"></i></button>-->

							<button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $id; ?>')" ;><i class="fa fa-eye"></i></button>

							<button type="button" class="btn btn-success btn-send btn-xs" onclick="enviar('<?php echo $id; ?>')"><i class="fa fa-envelope"></i></button>

						</td>
					</tr>
				</tbody>
			<?php } ?>
			<tfoot>
				<tr>
					<td colspan='10'>
						<?php
						$inicios = $offset + 1;
						$finales += $inicios - 1;
						echo "Mostrando $inicios al $finales de $numrows registros";
						echo paginate($reload, $page, $total_pages, $adjacents);
						?>
					</td>
				</tr>
			</tfoot>
		</table>
<?php
	} else {
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.</div>';
	}
}
?>