<!DOCTYPE html>
<html lang="br">
	<head>
	  	<title>Artilheiro</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
  		<script src="<?php echo $layout_name; ?>/js/systems.js" ></script>
  		<link rel="stylesheet" type="text/css" href="<?php echo $layout_name; ?>/css/bootstrap.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo $layout_name; ?>/css/style.css">
		<nav class="navbar navbar-inverse navbar-fixed-top">
	  		<div class="container-fluid">
	    		<div class="navbar-header">
	      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>                        
	      			</button>
	      			<a class="navbar-brand" href="?page=home">Artilheiro</a>
	    		</div>
	    		<div class="collapse navbar-collapse" id="myNavbar">
	      			<ul class="nav navbar-nav">
	        			<li class="active"><a href="#">Promoções</a></li>
	        			<li><a href="#">Relógios</a></li>
	        			<li><a href="#">Óculos</a></li>
	        			<li><a href="#">Correntes</a></li>
	      			</ul>
	      			<ul class="nav navbar-nav navbar-right">
	        			<li><a href="?page=account"><span class="glyphicon glyphicon-user"></span> Conta</a></li>
		        		<li class="dropdown">
		        			<a href="#" class="notification"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho <span class="badge">0</span></a>
		        			<div class="dropdown-content">
		        				<table class="table table-borderless">
		        					<tr>
		        						<th><img src="https://34525.cdn.simplo7.net/static/34525/sku/thumb_pulseira-cadeado-cartier-pulseira-baiana-4mm-banhada-a-ouro-18k--p-1574716507995.jpg" class="cart-product-image"/></th>
		        						<th>
		        							<div class="cart-product-name">Pulseira baiana 4mm banhada a ouro 18k</div>
		        							<div class="cart-product-price">229,90$</div>
		        						</th>
		        						<th><div><a href="?page=cart" class="btn btn-danger btn-block" role="button"/><span class="glyphicon glyphicon-trash"></span></a></div></th>
		        					</tr>
								</table>
								<table class="table table-borderless">
		        					<tr>
		        						<th><img src="https://34525.cdn.simplo7.net/static/34525/sku/corrente-corrente-baiana-4mm-banhada-a-ouro-18k--p-1572996000861.jpg" class="cart-product-image"/></th>
		        						<th>
		        							<div class="cart-product-name">Corrente baiana 4mm banhada a ouro 18k</div>
		        							<div class="cart-product-price">312,50$</div>
		        						</th>
		        						<th><div><a href="?page=cart" class="btn btn-danger btn-block" role="button"/><span class="glyphicon glyphicon-trash"></span></a></div></th>
		        					</tr>
								</table>
								<div><a href="?page=cart" class="btn btn-success btn-block" role="button"/>Finalizar Compra</a></div>
	        				</div>
		        		</li>
	      			</ul>
	    		</div>
	  		</div>
		</nav>
		<?php echo $main_content ?>
		<footer>
			<div>Artilheiro 2020 ©. Todos os direitos reservados.</div>
		</footer>
	</body>
</html>
