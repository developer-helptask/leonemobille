<form method="post" action="<?php echo BASE_URL; ?>banner/banner_save" enctype="multipart/form-data">
	<input type="text" name="name" placeholder="Banner">
	<label>Escolha sua Imagem</label>
	<input type="file" name="fotos">
	<input type="text" name="url">
	<input type="text" name="alt">
	<input type="text" name="title">
	<input type="submit" name="enviar" value="Enviar">
</form>