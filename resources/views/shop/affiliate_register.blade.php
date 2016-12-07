<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Registre-se</title>
	<link href="/shop/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/shop/js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Youth Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	<!-- start menu -->
	<script src="/shop/js/bootstrap.min.js"></script>
	<style type="text/css">
		.to-center{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container" style="margin-top:100px">
		{{-- {{dd($costumer)}} --}}
		<div class="row">
			<div class="col-md-12 to-center">
				<h3>Ajude o seu colega <b>{{ $costumer['name'] }}</b> a obter descontos!</h3>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-12 to-center">
				 <img src="{{ $costumer['photo'] }}" style="display: inline;"> 
			</div>	
		</div>

		<div class="row">
			<div class="col-md-12 to-center">
				<h3>{{ $costumer['name'] }}</h3>
			</div>	
		</div>


		<div class="row">
			<div class="col-md-4 col-md-offset-4" style="text-align: justify;border: 1px solid black;
    border-radius: 4px; margin-top:15px; margin-bottom: 15px;">
				<h4>Como funciona?</h4>
				<p>Faça um cadastro no site Laço de Fita e crie seu link de afiliados. Apresente a nossa loja e serviços para seus amigos de confiança e os envie o link para ser seu afiliado.</p>

				<h4>O que eu ganho com isso?</h4>
				<p>Assim que um dos seus amigos efetuar uma compra no site, <b>30% do nosso lucro será repassado para a sua carteira virtual</b> que podem ser usados para comprar produtos dentro da nossa loja.</p>
			</div>	
		</div>


		<div class="row">
			<div class="col-md-4 col-md-offset-4 to-center">
				<a class="btn btn-primary" href="/login/facebook">Registar com o Facebook</a>
			</div>	
		</div>
	</div>
</body>
</html>