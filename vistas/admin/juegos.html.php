<h2 style="float: left; margin-right: 30px;" >Gestión de juegos</h2>
<a class="btn btn-primary mb-3" href="juegos.php">Nuevo</a>
<form action="juegos.php" method="post">
	<div class="row">
		<div class="col-1">
			<label for="inputPassword6" class="col-form-label">ID</label>
			<div class="input-group">
			<input class="form-control" type="text" name="id" value="<?php echo isset($juego) ? $juego['id'] : '' ?>" readonly>
			</div>
		</div>
		<div class="col-auto">
			<label for="inputPassword6" class="col-form-label">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo isset($juego) ? $juego['nombre'] : '' ?>" required>
		</div>
		<div class="col-auto">
			<label for="inputPassword6" class="col-form-label">Precio</label>
			<input class="form-control" type="text" name="precio" value="<?php echo isset($juego) ? $juego['precio'] : '' ?>" required>
		</div>
		<div class="col-auto">
			<label for="inputPassword6" class="col-form-label">Cantidad</label>
			<input class="form-control" type="text" name="cantidad" placeholder="Cantidad" value="<?php echo isset($juego) ? $juego['cantidad'] : '' ?>" required>
		</div>						
		<div class="col-auto mb-3">
			<label for="inputPassword6" class="col-form-label">C. Barras</label>
			<input class="form-control" type="text" name="codigo_barras" placeholder="C. Barras" value="<?php echo isset($juego) ? $juego['codigo_barras'] : '' ?>" required>
		</div>
		<div class="col-auto mb-3">
			<label for="inputPassword6" class="col-form-label">Genero</label>
			<select class="form-select" name="genero_id">
			<?php foreach($generos as $genero): ?>
			<option value="<?php echo $genero['id'] ?>" <?=(isset($juego) and $genero['id']==$juego['genero_id']) ? 'selected':'' ?>><?php echo $genero['nombre'] ?></option>
			<?php endforeach; ?>
			</select>
			<?php // echo createSelect('genero_id', $generos, 'id', 'nombre', isset($juego) ? $juego['genero_id'] : null, 'form-select')?>
		</div>
		<div class="col-auto">
			<label for="inputPassword6" class="col-form-label">Fecha añadido</label>
			<input class="form-control" type="text" name="cantidad" placeholder="Fecha añadido..." value="<?php echo isset($juego) ? $juego['fecha'] : '' ?>" readonly>
		</div>					
	</div>
	<input class="btn btn-success mb-3" type="submit" value="Guardar">
</form>
<?php if(isset($juego)): ?>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
	<input type="hidden" name="id" value="<?php echo $juego['id'] ?>">
	<div class="col-5">
	<input type="file" class="form-control" name="foto">
	</div>
	<div class="col-3">
	<input class="btn btn-success mb-3" type="submit" value="Subir">
	</div>
</div>
</form>
<img style="height: 100px;" src="imagenes/<?php echo $juego['id']?>.jpg">
<?php endif; ?>
<div style="float: right;">
<?php include "paginacion.html.php" ?>
</div>
<?php /*if (isset($juego)): ?>
	<img src="barcode.php?f=svg&s=ean-13-nopad&d=<?= $juego['codigo_barras'] ?>">
<?php endif;*/ ?>
<table class="table">
	<tr>
		<th class="text-end">ID</th>
		<th>Imagen</th>
		<th>Nombre</th>
		<th class="text-end">Precio</th>
		<th class="text-end">Cantidad</th>
		<th class="text-center">C. Barras</th>
		<th class="text-center">Categoría</th>
		<th class="text-center">Fecha añadido</th>
		<th class="text-center">Acciones</th>
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
			<td class="text-center"><a class="btn btn-primary" href="juegos.php?editar=<?= $juego['id'] ?>">Editar</a> <a class="btn btn-danger" href="juegos.php?borrar=<?= $juego['id'] ?>">Borrar</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<div style="float: right;">
<?php include "paginacion.html.php" ?>
</div>