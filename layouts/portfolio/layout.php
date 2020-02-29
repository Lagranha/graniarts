<!DOCTYPE html>
<html lang="br">
	<head>
	  	<title>Marmoraria Graniart's</title>
	  	<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  	<meta name="description" content="">
	  	<meta name="author" content="Guilherme Lagranha e Luan Carminatti">

  		<!-- Custom styles for this template-->
  		<link rel="stylesheet" type="text/css" href="<?php echo $layout_name; ?>/css/bootstrap.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo $layout_name; ?>/css/style.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  		<script src="<?php echo $layout_name; ?>/js/systems.js" ></script>
	  	<script src="https://cdn.tiny.cloud/1/quygal2vkcs9ippsoaraz81qi6qpnv9phhpll1tvrlomyjlf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	  	<!-- Custom fonts for this template-->
	  	<link href="<?php echo $layout_name; ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	  	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  	</head>
  	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	  		<div class="container-fluid">
	    		<div class="navbar-header">
	      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#openNavbar">
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>                        
	      			</button>
	      			<a class="navbar-brand" href="?page=home">Graniart's</a>
	    		</div>
	    		<div class="collapse navbar-collapse" id="openNavbar">
	      			<ul class="nav navbar-nav">
	        			<li><a href="?page=company">A Empresa</a></li>
	        			<li><a href="?page=stones">Pedras</a></li>
	        			<li><a href="?page=portfolio">Portifólio</a></li>
	        			<li><a href="?page=partners">Parceiros</a></li>
	        			<li><a href="?page=contact">Contato</a></li>
	      			</ul>
	      			<ul class="nav navbar-nav navbar-right">
	        			<li><a href="?page=budget"><span class="glyphicon glyphicon-user"></span> Orçamento</a></li>
	      			</ul>
	    		</div>
	  		</div>
		</nav>
		<?php echo $main_content ?>
		<footer>
			<div>
				<p>Marmoraria Graniart's 2020</p>
				© Todos os direitos reservados.
			</div>
		</footer>
	</body>
</html>