<?php
	ob_start();
	session_start();



	$view = isset($_GET['view']) ? $_GET['view'] : 'index';
	
	require('config/config.php');

	//cargo la vista
	if (file_exists('view/'.$view.'-view.php')) {
		include("view/".$view."-view.php");
	}else{
		include("view/error-view.php");
		//echo "No existe";
	}

	require 'functions.php';

	//$conexion = conexion($bd_config);

	// Obtenemos los post
	//$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

	//$conexion = conexion($bd_config);



