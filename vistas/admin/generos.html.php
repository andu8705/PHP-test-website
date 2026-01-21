<h2>Gestión de categorías</h2>
<a class="btn btn-primary mb-3" href="generos.php">Nuevo</a>

<form action="generos.php" method="post" class="form-inline">
	<div class="row">
		<div class="form-group col-2">
			<label>ID</label>
			<input class="form-control" type="text" name="id" placeholder="ID" value="<?php echo isset($genero) ? $genero['id'] : '' ?>" readonly>
		</div>
		<div class="form-group col-4">
			<label>Nombre</label>
			<input class="form-control mb-3" type="text" name="nombre" placeholder="Nombre" value="<?php echo isset($genero) ? $genero['nombre'] : '' ?>" required>
		</div>
	</div>
	<input class="btn btn-success"  type="submit" value="Guardar">
</form>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($generos as $genero): ?>
		<tr>
			<td><?= $genero['id'] ?></td>
			<td><?= $genero['nombre'] ?></td>
			<td><a class="btn btn-primary"  href="generos.php?editar=<?= $genero['id'] ?>">Editar</a> <a class="btn btn-danger"  href="generos.php?borrar=<?= $genero['id'] ?>">Borrar</a></td>
		</tr>
	<?php endforeach; ?>
</table>