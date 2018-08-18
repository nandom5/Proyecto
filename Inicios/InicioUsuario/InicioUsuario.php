

<?php
include ('../../Objeto/login.php');
session_start();

if(!isset($_SESSION['usuario']))   // Checking whether the session is already there or not if
    // true then header redirect it to the home page directly
{
    header("Location: ../../index.php");
}


?>




<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Inicio</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Negotiation Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/main.js"></script>
<!-- //js -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">
 </head>
<body>
<!-- banner -->
	<div class="w3ls-banner-info-bottom">
		<div class="container">
			<div class="banner-address">
				<div class="col-md-3 banner-address-left">
					<p><i class="fa fa-map-marker" aria-hidden="true"></i>Jutiapa, Guatemala.</p>
				</div>
				<div class="col-md-3 banner-address-left">
					<p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:example@email.com">subsidios@gmail.com</a></p>
				</div>

				<div class="col-md-3 banner-address-left">
					<p><i class="fa fa-phone" aria-hidden="true"></i> +502 4214 9435</p>
				</div>
					<div class="col-md-3 agile_banner_social">
						<ul class="agileits_social_list">
							<li><a href="https://www.facebook.com/lemusmenendez" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

						</ul>
					</div>
					<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand" href="../../index.html">Best Help Enterprise</a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-13" id="cl-effect-13">
						<ul class="nav navbar-nav">
                            <li class="active"><a href="../../Formularios/FormularioExpedientes/FormularioExpedientes.php">&nbsp &nbsp Solicitud</a></li>
                            <li class="active"><a href="../Requisitos.pdf"  download="Requisitos para subsidio">Descargar Requisitos</a></li>


                            <?php

                            $login = new login;

                            $usuario= $login->getRol();



                            echo "<li class='active'><a >$usuario</a></li>";
                            echo "<li class='active'><a href='../../Objeto/CerrarSesion.php'>Cerrar Sesión</a></li>"


                            ?>






                        </ul>

			</nav>
		</div>
	</div>
	<div class="banner">
		<div class="container">
			<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="agileits_w3layouts_banner_info">
									<h3>La mejor empresa de ayudas del pais</h3>
									<p>Somos la mejor empresa de todo el pais, que brinda mayores facilidades para construir tu vivienda. Sin mayores requisitos, si lo necesitas aplica por tu subsidio !CONFIA EN NOSOTROS¡</p>
									<div class="agileits_w3layouts_more">
										<a href="#" data-toggle="modal" data-target="#myModal">Conocenos</a>
									</div>
								</div>
							</li>
							<li>
								<div class="agileits_w3layouts_banner_info">
									<h3>!Te ayudamos de inmediato!</h3>
									<p>Somos la empresa lider en brindar subsidios en el pais, te ayudamos rapidamente, si tienes dudas comunicate con nosotros !CONFIA EN NOSOTROS¡ </p>
									<div class="agileits_w3layouts_more">
										<a href="#" data-toggle="modal" data-target="#myModal">Conocenos</a>
									</div>
								</div>
							</li>

						</ul>
					</div>
				</section>
			<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				</script>
			<!-- //flexSlider -->
		</div>
	</div>
<!-- //banner -->
<!-- services -->
	<div class="services">
		<div class="container">
			<h2 class="w3ls_head"><span>Bienvenidos </span></h2>
			<div class="services-w3lsrow">
				<div class="col-md-4 services-grids top">  
					<i class="fa fa-database" aria-hidden="true"></i>
					<h4>Financiamiento</h4>
					<p>Te brindamos tu subsidio de la manera mas rapida, analizamos tu caso, y te damos la mayor cantidad.</p>
				</div>
				<div class="col-md-4 services-grids top-1">
					<i class="fa fa-group icon" aria-hidden="true"></i> 
					<h4>Atención al Cliente </h4>
					<p>La mejor atención a todos nuestro clientes, que son parte importante importante de nuestra empresa.</p>
				</div>
				<div class="col-md-4 services-grids top-2">
					<i class="fa fa-cubes" aria-hidden="true"></i>
					<h4>Subsidios</h4>
					<p>Se brindan subsidios a todo el pais. Si lo necesitas aplica por el tuyo</p>
				</div> 
				<div class="col-md-4 services-grids top-3">  
					<i class="fa fa-gears icon" aria-hidden="true"></i> 
					<h4>!No lo dudes!</h4>
					<p>No dudes, somos la mejor empresa que te ayudara en tu subsidio.</p>
				</div>
				<div class="col-md-4 services-grids top-4">
					<i class="fa fa-external-link" aria-hidden="true"></i>
					<h4>Siguenos</h4>
					<p><a target="_blank" href="https://www.facebook.com/lemusmenendez">Visitanos en nuestra red social preferida</a></p>
				</div>
				<div class="col-md-4 services-grids top-5">
					<i class="fa fa-briefcase icon" aria-hidden="true"></i>
					<h4>Equipo de Trabajo</h4>
					<p>Kevin Noé Lemus Menéndez 0905-15-2685.</p>

					<p>Luis Fernando Méndez Salguero 0905-15-4263.</p>
				</div> 					
				<div class="clearfix"> </div>
			</div> 			
		</div>
	</div>	



<!-- //stats -->
<!-- about-team -->
	<div class="team">
		<div class="container">
			<h2 class="w3ls_head"><span>Nuestro Equipo </span></h2>
			<div class="team-row-agileinfo">
				<div class="col-md-3 col-sm-6 col-xs-6 team-grids">
					<div class="thumbnail team-agileits">
						<img src="images/t1.jpg" class="img-responsive" alt=""/>
						<div class="w3agile-caption">
							<h4>Kevin Lemus</h4>
							<p>Presidente</p>
							<div class="social-w3lsicon">

								<a target="_blank" href="https://www.facebook.com/lemusmenendez"><i class="fa fa-facebook"></i></a>
								<a target="_blank" href="https://plus.google.com/u/0/106891702165203747491"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 team-grids">
					<div class="thumbnail team-agileits">
						<img src="images/t2.jpg" class="img-responsive" alt=""/>
						<div class="w3agile-caption">
							<h4>Luis Méndez</h4>
							<p>Presidente</p>
							<div class="social-w3lsicon">
								<a target="_blank" href="https://www.facebook.com/luisfernando.mendez.79"><i class="fa fa-facebook"></i></a>

							</div>
						</div>
					</div>
				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about-team -->
<!-- testimonials -->



	<div class="footer">
		<div class="container">
			<div class="agile-footer-grids">
				<div class="col-md-4 agile-footer-grid">
					<h4>Sobre Nosotros</h4>
					<p>Somos un equipo de estudiantes de ingenieria en sistemas de la universidad Mariano Galvez de Guatemala, cursamos el octavo ciclo</p>
				</div>
				<div class="col-md-4 agile-footer-grid">

				</div>
				<div class="col-md-4 agile-footer-grid">
					<h4>Eventos</h4>
					<ul>
						<li>10 de Mayo de 2010<a >Inaguración de la Empresa</a></li>
						<li>15 de Junio de 2014 <a> Nos convertimos en la empresa lider del pais</a></li>
						<li>6 de Octubre de 2017 <a >Evento para personas interesadas en aplicar</a></li>

					</ul>
				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer -->
	<!-- copyright -->
	<div class="agileits-w3layouts-copyright">
		<div class="container">
			<p>© 2018 Best Helper Enterprise. All rights reserved | Design by <a href="https://www.facebook.com/lemusmenendez">Best Helper Enterprise</a></p>
		</div>
	</div>
	<!-- //copyright -->
	<!-- //Modal1 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<!-- Modal1 -->
		<div class="modal-dialog">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Forma de Negociación</h4>
							<img src="images/g11.jpg" alt=" " class="img-responsive">
							<h5>Sabemos lo que buscas</h5>
							<p>Te brindamos la mejor ayuda del pais, si necesitas un subsidio no dudes en aplicar para obtenerlo. !CONFIA EN NOSOTROS¡</p>
					</div>
				</div>
		</div>
	</div>
<!-- //Modal1 -->

<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>