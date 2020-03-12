<?php
	//session_start();
	//$_SESSION['user_id']=1;
	if (isset($_SESSION['user_id'])) {

		unset($_SESSION['dashboard']);
		unset($_SESSION['empleados']);
		unset($_SESSION['taller']);
		unset($_SESSION['seguro']);
		unset($_SESSION['empresa']);
		unset($_SESSION['admin']);
		unset($_SESSION['vehiculo']);
		unset($_SESSION['tarjeta']);
		unset($_SESSION['reparaciones']);
		unset($_SESSION['choque']);
		unset($_SESSION['configuracion']);
		unset($_SESSION['trasladista']);
		unset($_SESSION['adminser']);
		

		session_destroy();
		header("location: ./?view=index"); //estemos donde estemos nos redirije al index
	}

?>