<form method="post" action="<?php echo BASE_URL; ?>produtos/produto_save" enctype="multipart/form-data">
	<select name="categorias">
		<?php foreach ($lista_cat as $itemc): ?>
		<option value="<?php echo $itemc['id']; ?>"><?php echo $itemc['name']; ?></option>
        <?php endforeach; ?>
	</select>
	
	<input type="hidden" name="name" value="Produto">
	<input type="file" name="images">
	<input type="submit" name="enviar" value="Enviar">

</form>