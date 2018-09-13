<link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">



<div class="container">
	<div class="col">
		<h2>HELPCONTROL</h2>
		<p>Digite seu email e senha</p>
		<form id="login" method="post">
<form method="POST">
<input type="text" name="name"><br/><br/>
<input type="password" name="password"><br/><br/>
<input type="submit" name="" value="Entrar">
</form>
			<?php if(isset($error) && !empty($error)): ?>
			<div class="erro" id="MsgErro"><?php echo $error; ?></div>
			<?php endif; ?>
	</div>

</div>
</body>
</html>


