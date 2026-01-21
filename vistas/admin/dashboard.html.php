<?php
echo "<h1>Bienvenido, $nombre</h1>";
echo "<p>Nombre completo: $nombre_completo</p>";
echo "<p>Email: $email</p>";
echo "<p>Telefono: $telefono</p>";
echo "<p>Hora de conexión: " . $_SESSION['hora_conexion'] . "</p>";
?>
<table class="table">
	<tr>
		<th class="text-end">ID</th>
		<th>Imagen</th>
		<th>Nombre</th>
		<th class="text-end">Precio</th>
		<th class="text-end">Cantidad</th>
		<th class="text-center">C. Barras</th>
		<th class="text-center">Genero</th>
        <th class="text-center">Fecha añadido</th>
	</tr>
	<?php foreach ($juegos as $juego): ?>
		<tr>
			<td class="text-end"><?= $juego['id'] ?></td>
			<td><img style="height: 30px;" src="imagenes/<?php echo $juego['id']?>.jpg"></td>
			<td><?= $juego['nombre'] ?></td>
			<td class="text-end"><?= $juego['precio'] ?> &euro;</td>
			<td class="text-end"><?= $juego['cantidad'] ?></td>
			<td class="text-center"><?= $juego['codigo_barras'] ?></td>
			<td class="text-center"><?= $juego['genero'] ?></td>
            <td class="text-center"><?= $juego['fecha'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>