<form method="post" action="<?php echo BASE_URL; ?>category/cat_save" enctype="multipart/form-data">
	<input type="text" name="name" placeholder="Nome da Categoria">
	<input type="file" name="fotos">
	<input type="hidden" name="status" value="1">
	<input type="submit" name="enviar" value="Enviar">
</form>