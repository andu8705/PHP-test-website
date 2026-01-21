<?php
require('comun.inc.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$genero['id'] = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$genero['nombre'] = $_REQUEST['nombre'];

	if ($genero['id'] == null) {
		$id = db_insert($conn, 'generos', $genero);
	} else {
		db_update($conn, 'generos', $genero);
		$id = $genero['id'];
	}

	$conn = db_close($conn);
	header('Location: generos.php?editar=' . $id);
} else {
	// Para borrar
	if (isset($_REQUEST['borrar']) and is_integer(intval($_REQUEST['borrar']))) {
		db_delete_by_id($conn, 'generos', $_REQUEST['borrar']);
		// Para editar. Comprobamos que está el parámetro editar y es un número entero
	} else if (isset($_REQUEST['editar']) and is_integer(intval($_REQUEST['editar']))) {
		$id = intval($_REQUEST['editar']);
		// Cargamos el genero con el id
		$res = db_query($conn, "SELECT * FROM generos WHERE id=?", [$id]);

		if (count($res) == 1) {
			$genero = $res[0];
		}
	}
}

$generos = db_query($conn, "SELECT * FROM generos");
$conn = db_close($conn);

$titulo = 'Gestión de categorías';
$vista = 'generos';
require("../vistas/admin/plantilla.html.php");
