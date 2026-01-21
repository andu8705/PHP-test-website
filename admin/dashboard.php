<?php
require('comun.inc.php');
$conn = db_open();
$generos = db_query($conn, "SELECT * FROM generos");

$num_por_pagina=4;  // Items por página
$pagina=isset($_GET['p']) ? $_GET['p'] : 1; // Obtenemos el número de la página

$total=db_query($conn, "select count(*) as total from juegos")[0]['total'];  // Obtenemos el total

$num_paginas=ceil($total/$num_por_pagina);  // Obtenemos el número de páginas
$offset=($pagina-1)*$num_por_pagina;

$juegos = db_query($conn, "SELECT p.*, c.nombre as genero FROM juegos p INNER JOIN generos c ON p.genero_id=c.id ORDER BY p.id DESC LIMIT $num_por_pagina OFFSET $offset");

$conn = db_close($conn);

$usuario = $_SESSION['usuario'];
$nombre = $usuario['nombre'];
$nombre_completo = $usuario['nombre_completo'];
$email = $usuario['email'];
$telefono = $usuario['telefono'];
$password = $usuario['password'];

$titulo = "Dashboard";
$vista = 'dashboard';
require("../vistas/admin/plantilla.html.php");