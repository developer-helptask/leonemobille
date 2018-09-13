<html>
<head>
	<title>Área Administrativa</title>

	<link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/template.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>
	<div class="left-menu">
		<div class="company_name">
			<?php echo $viewData['user_name']; ?>
		</div>

		<div class="menuarea">
			<ul>
				<li><a href="<?php echo BASE_URL; ?>">Inicio</a></li>
				<li><a href="<?php echo BASE_URL; ?>banner">Banners</a></li>
				<li><a href="<?php echo BASE_URL; ?>category">Categorias</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos">Produtos</a></li>
				<li><a href="#">Suporte</a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="top">
			<div class="top_right"><a href="<?php echo BASE_URL; ?>/login/logout">SAIR</a></div>
			<div class="top_right"><a href="<?php echo BASE_URL; ?>">SITE</a></div>
			<div class="top_right"><?php echo $viewData['user_email']; ?></div>
		</div>
		<div class="area">
			
	<?php $this->loadViewInTemplateAdmin($viewName, $viewData); ?>
		</div>
	</div>
	


	 <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 <script
  src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
 <script
  src="<?php echo BASE_URL; ?>assets/js/action.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-html5-1.5.2/datatables.min.js"></script>
</body>
</html>