<?php
include 'functions.php';

$stmt = $pdo->query("SELECT * from evento");
$stmt->execute();
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sio Cafe - Eventi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/css/normalize.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="assets/js/modernizr.js"></script>
		<link href="assets/css/style_eventi.css" rel="stylesheet" type="text/css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body>
		<!--- Top Navbar --->
		<nav id="nav">
			<div class="warp-menu">
				<ul class="menu">
					<li><a href="eventi.php">Eventi</a></li>
					<li><a href="servizi.html">Servizi</a></li>
					<li><a href="galleria.html">Galleria</a></li>
				</ul>
			</div>

			<div class="warp-menu">
				<a href="index.php">
					<img src="assets/img/logos/logo.png" alt="Main_logo" height="50" id="logo">
				</a>
			</div>

			<div class="warp-menu">
				<ul class="menu-2">
					<li><a href="faq.html">F.A.Q.</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contatti.html">Contatti</a></li>
				</ul>
			</div>

			<div class="navbar">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</div>
		</nav>

		<!--- Hero Section --->
		<main>
			<div class="hero">
				<h1>Sempre pronti a farvi divertire</h1>
				<p>Il Sio è un locale che non ha mai smesso di rinnovarsi: anticonformista, raffinato e familiare, è un centro pulsante di cultura giovane, moda, aggregazione e grande divertimento.</p>
			</div>
		</main>

		<!--- Products Section --->
		<section class="products" id="s-pro">
			<header>
				Le nostre Serate
				<hr>
			</header>

			<div class="warp_col">
				<?php	while($eventi = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
				<div class="colonne">
					<a href="serata.php?id=<?=$eventi->id;?>">
						<div class="card">
							<img src="assets/img/cards/card2.png" alt="img-card">
							<a href="serata.php?id=<?=$eventi->id;?>">
								<button type="button" name="Link">Maggiori Info</button>
							</a>
							<div class="mask"></div>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</section>

		<!--- Footer Section --->
		<footer>
			<section class="footer-map">
				<div class="foo-col">
					<header>LOCATION:</header>
					<p>Sio Cafe Milano Via Temolo, 1 (ang. Via Pirelli)<br>20126 Milano (Bicocca)</p>
					<p><a href="#">Juliette S.r.l.</a></p>
					<p><b>P.IVA:</b> 10947950969</p>
				</div>

				<div class="foo-col">
					<header>INFO:</header>
					<p><b>Mobile:</b> <a href="tel:+39 349 385 4362"> 349 385 4362</a></p>
					<p><b>Email:</b> <a href="mailto:info@siocafemilano.com"> info@siocafemilano.com</a></p>
				</div>

				<div class="foo-col">
					<header>SEGUICI ANCHE SU:</header>
					<a href="https://www.facebook.com/siocafe" target="_blank">
						<i class="fab fa-facebook-square fa-2x"></i>
					</a>
					<a href="https://www.instagram.com/siocafeofficial/" target="_blank">
					<i class="fab fa-instagram-square fa-2x"></i>
					</a>
				</div>
			</section>

			<section class="footer-copy">
				<p>© Copyright 2021 sio-cafe.com - All Rights Reserved<br><br><a hre="#">Temini e Condizioni </a>&nbsp - &nbsp<a hre="#"> Cookie Policy</a></p>
				<button onclick="topFunction()" title="Go to top">
					<i class="fas fa-arrow-circle-up fa-2x"></i>
				</button>
			</section>
		</footer>

		<script>
			/* --- Funzioni per il Top Button --- */
			function topFunction() {
			  document.body.scrollTop = 0;
			  document.documentElement.scrollTop = 0;
			}

			/* --- Funzioni per il Mobile Menu --- */
			$(document).ready(function(){
				$('.navbar').click(function(){
					$('.menu').toggleClass('open');
					$('.menu-2').toggleClass('open');
				});
			});

			$(window).on('resize', function(){
				var win = $(this); //this = window
				if (win.width() > 768) {
					$('.menu').removeClass('open');
					$('.menu-2').removeClass('open');
				}
			});
		</script>
	</body>
</html>
