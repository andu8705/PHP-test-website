<?php
require('comun.inc.php');
require('../librerias/html_helper.php');
$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if(isset($_FILES['foto']))
	{
		copy($_FILES['foto']['tmp_name'], 'imagenes/'.$_REQUEST['id'].'.jpg');
		header('Location: juegos.php?editar=' .$_REQUEST['id']);
		exit;
		/*print_r($_FILES);
		print_r($_REQUEST);
		exit;*/
	}
	
	$juego['id'] = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$juego['nombre'] = $_REQUEST['nombre'];
	$juego['cantidad'] = $_REQUEST['cantidad'];
	$juego['codigo_barras'] = $_REQUEST['codigo_barras'];
	$juego['genero_id'] = $_REQUEST['genero_id'];
	$juego['precio'] = $_REQUEST['precio'];
	$juego['fecha'] = $_REQUEST['fecha'];

	if ($juego['id'] == null) {
		$id = db_insert($conn, 'juegos', $juego);
	} else {
		db_update($conn, 'juegos', $juego);
		$id = $juego['id'];
	}


	$conn = db_close($conn);
	header('Location: juegos.php?editar=' . $id);
} else {
	// Para borrar
	if (isset($_REQUEST['borrar']) and is_integer(intval($_REQUEST['borrar']))) {
		db_delete_by_id($conn, 'juegos', $_REQUEST['borrar']);
		// Para editar. Comprobamos que está el parámetro editar y es un número entero
	} else if (isset($_REQUEST['editar']) and is_integer(intval($_REQUEST['editar']))) {
		$id = intval($_REQUEST['editar']);
		// Cargamos el juego con el id
		$res = db_query($conn, "SELECT * FROM juegos WHERE id=?", [$id]);

		if (count($res) == 1) {
			$juego = $res[0];
		}
	}
}

$generos = db_query($conn, "SELECT * FROM generos");

$num_por_pagina=9;  // Items por página
$pagina=isset($_GET['p']) ? $_GET['p'] : 1; // Obtenemos el número de la página

$total=db_query($conn, "select count(*) as total from juegos")[0]['total'];  // Obtenemos el total

$num_paginas=ceil($total/$num_por_pagina);  // Obtenemos el número de páginas
$offset=($pagina-1)*$num_por_pagina;

$juegos = db_query($conn, "SELECT p.*, c.nombre as genero FROM juegos p INNER JOIN generos c ON p.genero_id=c.id  LIMIT $num_por_pagina OFFSET $offset");

$conn = db_close($conn);

$titulo = "Gestión de juegos";
$vista = 'juegos';
require("../vistas/admin/plantilla.html.php");
