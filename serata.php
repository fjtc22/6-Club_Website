<?php
include 'functions.php';

if(isset($_GET['id'])){
	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$cognome = $_POST['cognome'];
		$email = $_POST['email'];
		$telefono = $_POST['ntel'];

		$persone = $_POST['perdropdown'];
		$aggpersone = $_POST['dropdown-peragg'];
		$tavolo = $_POST['tav'];
		$tipotavolo = $_POST['dropdownTav'];

		$femmine = $_POST['nfemmine'];
		$maschi = $_POST['nmaschi'];
		$comment = $_POST['comment'];

		//Query for insertion
		$data = [
			'nome' => $nome,
			'cognome' => $cognome,
			'email' => $email,
			'telefono' => $telefono,
			'persone' => $persone,
			'aggpersone' => $aggpersone,
			'tavolo' => $tavolo,
			'tipotavolo' => $tipotavolo,
			'femmine' => $femmine,
			'maschi' => $maschi,
			'comment' => $comment,
			'id_prenotazione' => $_GET['id'],
		];

		$sql = "INSERT INTO prenotazioni (nome, cognome, email, telefono, persone, aggpersone, tavolo, tipotavolo, femmine, maschi, comment, id_prenotazione) VALUES (:nome, :cognome, :email, :telefono, :persone, :aggpersone, :tavolo, :tipotavolo, :femmine, :maschi, :comment, :id_prenotazione)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute($data);

	}

	$stmt = $pdo->prepare("SELECT * from evento WHERE id = ?");
	$stmt->execute([$_GET['id']]);
	$eventi = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sio Cafe - <?php echo $eventi['nome']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/css/normalize.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="assets/js/modernizr.js"></script>
		<link href="assets/css/style_serata.css" rel="stylesheet" type="text/css">
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
				<div class="logo-serata">
					<img src="assets/img/logos/about-logo.jpg" style="width: 100%;" alt="logo-serata">
				</div>
				<h1><?=$eventi['nome']?></h1>
				<p><?=$eventi['descrizione']?></p>
			</div>
		</main>

		<!--- Cost Section --->

		<section class="cost">
			<header>Disponibilità e Costi</header>

			<hr>

			<div class="cost-warp">
				<div class="tav">
					<h2>Disponibilità Tavoli Normali</h2>
					<p><span id="ntavoli-normali">50</span> Tavoli (<?=$eventi['costoNormale']?>€)</p>
				</div>

				<div class="tav">
					<h2>Disponibilità Tavoli V.I.P.</h2>
					<p><span id="ntavoli-vip">20</span> Tavoli (<?=$eventi['costoVip']?>€)</p>
				</div>
			</div>
		</section>

		<!--- Booking Section --->

		<section class="booking">
			<header>Prenota ora</header>

			<hr>

			<form method="post">
				<input type="text" id="nome" name="nome" placeholder="Nome">

				<input type="text" id="cognome" name="cognome" placeholder="Cognome">

				<input type="email" id="email" name="email" placeholder="E-mail">

				<input type="tel" id="ntel" name="ntel" placeholder="N° di Telefono">

				<select id="tav" name="dropdownTav">
					<option value="" disabled selected>Tipologia di Tavolo</option>
					<option value="Tavolo Normale">Tipologia Normale</option>
					<option value="Tavolo VIP">Tipologia V.I.P.</option>
				</select>

				<select id="n-tav" name="tav" class="quantita-tavoli">
					<option value="0" disabled selected>Quantità di tavoli</option>
					<option value="1">1 Tavolo</option>
					<option value="2">2 Tavoli</option>
					<option value="3">3 Tavoli</option>
					<option value="4">4 Tavoli</option>
					<option value="5">5 Tavoli</option>
				</select>

				<select id="nper" name="perdropdown" >
					<option value="" disabled selected>N° di Persone</option>
					<option value="1" class="quantita-persone">1 Persona</option>
					<option value="2" class="quantita-persone">2 Persone</option>
					<option value="3" class="quantita-persone">3 Persone</option>
					<option value="4" class="quantita-persone">4 Persone</option>
					<option value="5" class="quantita-persone">5 Persone</option>
					<option value="6" class="quantita-persone">6 Persone</option>
					<option value="7" class="quantita-persone">7 Persone</option>
					<option value="8" class="quantita-persone">8 Persone</option>
					<option value="9" class="quantita-persone">9 Persone</option>
					<option value="10" class="quantita-persone">10 Persone</option>
					<option value="11" class="quantita-persone">11 Persone</option>
					<option value="12" class="quantita-persone">12 Persone</option>
					<option value="13" class="quantita-persone">13 Persone</option>
					<option value="14" class="quantita-persone">14 Persone</option>
					<option value="15" class="quantita-persone">15 Persone</option>
					<option value="16" class="quantita-persone">16 Persone</option>
					<option value="17" class="quantita-persone">17 Persone</option>
					<option value="18" class="quantita-persone">18 Persone</option>
					<option value="19" class="quantita-persone">19 Persone</option>
					<option value="20" class="quantita-persone">20 Persone</option>
					<option value="21" class="quantita-persone">21 Persone</option>
					<option value="22" class="quantita-persone">22 Persone</option>
					<option value="23" class="quantita-persone">23 Persone</option>
					<option value="24" class="quantita-persone">24 Persone</option>
					<option value="25" class="quantita-persone">25 Persone</option>
				</select>

				<select id="peragg" name="dropdown-peragg">
					<option value="" disabled selected>Persone aggiuntive (10€/p)</option>
					<option value="0">0 Persone Agg.</option>
					<option value="+1">+1 Persona</option>
					<option value="+2">+2 Persone</option>
					<option value="+3">+3 Persone</option>
				</select>

				<select id="nfemmine" name="nfemmine">
					<option value="0" disabled selected>N° Femmine</option>
					<option value="1" class="quantita-femmine">1 Femmine</option>
					<option value="2" class="quantita-femmine">2 Femmine</option>
					<option value="3" class="quantita-femmine">3 Femmine</option>
					<option value="4" class="quantita-femmine">4 Femmine</option>
					<option value="5" class="quantita-femmine">5 Femmine</option>
					<option value="6" class="quantita-femmine">6 Femmine</option>
					<option value="7" class="quantita-femmine">7 Femmine</option>
					<option value="8" class="quantita-femmine">8 Femmine</option>
					<option value="9" class="quantita-femmine">9 Femmine</option>
					<option value="10" class="quantita-femmine">10 Femmine</option>
					<option value="11" class="quantita-femmine">11 Femmine</option>
					<option value="12" class="quantita-femmine">12 Femmine</option>
					<option value="13" class="quantita-femmine">13 Femmine</option>
					<option value="14" class="quantita-femmine">14 Femmine</option>
					<option value="15" class="quantita-femmine">15 Femmine</option>
					<option value="16" class="quantita-femmine">16 Femmine</option>
					<option value="17" class="quantita-femmine">17 Femmine</option>
					<option value="18" class="quantita-femmine">18 Femmine</option>
					<option value="19" class="quantita-femmine">19 Femmine</option>
					<option value="20" class="quantita-femmine">20 Femmine</option>
					<option value="21" class="quantita-femmine">21 Femmine</option>
					<option value="22" class="quantita-femmine">22 Femmine</option>
					<option value="23" class="quantita-femmine">23 Femmine</option>
					<option value="24" class="quantita-femmine">24 Femmine</option>
					<option value="25" class="quantita-femmine">25 Femmine</option>
				</select>

				<select id="nmaschi" name="nmaschi">
					<option value="0" disabled selected>N° Maschi</option>
					<option value="1" class="quantita-maschi">1 Maschi</option>
					<option value="2" class="quantita-maschi">2 Maschi</option>
					<option value="3" class="quantita-maschi">3 Maschi</option>
					<option value="4" class="quantita-maschi">4 Maschi</option>
					<option value="5" class="quantita-maschi">5 Maschi</option>
					<option value="6" class="quantita-maschi">6 Maschi</option>
					<option value="7" class="quantita-maschi">7 Maschi</option>
					<option value="8" class="quantita-maschi">8 Maschi</option>
					<option value="9" class="quantita-maschi">9 Maschi</option>
					<option value="10" class="quantita-maschi">10 Maschi</option>
					<option value="11" class="quantita-maschi">11 Maschi</option>
					<option value="12" class="quantita-maschi">12 Maschi</option>
					<option value="13" class="quantita-maschi">13 Maschi</option>
					<option value="14" class="quantita-maschi">14 Maschi</option>
					<option value="15" class="quantita-maschi">15 Maschi</option>
					<option value="16" class="quantita-maschi">16 Maschi</option>
					<option value="17" class="quantita-maschi">17 Maschi</option>
					<option value="18" class="quantita-maschi">18 Maschi</option>
					<option value="19" class="quantita-maschi">19 Maschi</option>
					<option value="20" class="quantita-maschi">20 Maschi</option>
					<option value="21" class="quantita-maschi">21 Maschi</option>
					<option value="22" class="quantita-maschi">22 Maschi</option>
					<option value="23" class="quantita-maschi">23 Maschi</option>
					<option value="24" class="quantita-maschi">24 Maschi</option>
					<option value="25" class="quantita-maschi">25 Maschi</option>
				</select>

				<input type="hidden" id="ID-prenotazione" name="ID-prenotazione" value="">

				<input type="hidden" id="ntavolirimanenti" name="ntavolirimanenti" value="">

				<input type="hidden" id="vtavolirimanenti" name="vtavolirimanenti" value="">

				<textarea id="comment" name="comment" placeholder="Commenti da aggiungere..."></textarea>

				<input type="submit" id="submit" name="submit" value="Prenota Ora">
			</form>
		</section>

		<!------------------------------------- List Section ------------------------------------------------->

		<section class="bottles">
			<header>Lista Bottiglie</header>

			<hr>

			<div class="list-bottles">
				<div class="bottle">
					<h5>VODKA</h5>
					<p>Belvedere (0.7l) (150 €)</p>
				</div>

				<div class="bottle">
					<h5>VODKA</h5>
					<p>Belvedere (1.75l) (350 €)</p>
				</div>

				<div class="bottle">
					<h5>WHISKY</h5>
					<p>Gold (150 €)</p>
				</div>

				<div class="bottle">
					<h5>CHAMPAGNE</h5>
					<p>Moet Imperial (130 €)</p>
				</div>

				<div class="bottle">
					<h5>CHAMPAGNE</h5>
					<p>Moet Ice (180 €)</p>
				</div>

				<div class="bottle">
					<h5>CHAMPAGNE</h5>
					<p>Moet Nir (250 €)</p>
				</div>

				<div class="bottle">
					<h5>CHAMPAGNE</h5>
					<p>Moet Magunm (350 €)</p>
				</div>

				<div class="bottle">
					<h5>CHAMPAGNE</h5>
					<p>Don Perignon (350 €)</p>
				</div>

				<div class="bottle">
					<h5>COGNAC</h5>
					<p>Remy (130 €)</p>
				</div>
			</div>
		</section>

		<!--- Gallery Section --->

		<section class="gallery">
			<header>Galleria</header>

			<hr>

			<div class="grid-gallery">
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
				<div class="img-gallery"></div>
			</div>
		</section>

		<!--- Maps Section --->

		<section class="maps">
			<header>Mappa</header>

			<hr>

			<div class="grid-maps">
				<div class="item-maps">
					<img src="assets/img/mappe/sala-dentro.svg" alt="map-outdoor" style="width: 100%;">
				</div>

				<div class="item-maps">
					<img src="assets/img/mappe/sala-fuori.svg" alt="map-outdoor" style="width: 100%;">
				</div>
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

			/* --- Funzioni per Form --- */

			/* Const per i Selettori da parte del Utente */

			const selectTipologia = document.querySelector('#tav');
			const selectTavoli = document.querySelector('.quantita-tavoli');
			const selectPersone = document.querySelector('#nper');
			const selectMaschi = document.querySelector('#nmaschi');
			const selectFemmine = document.querySelector('#nfemmine');
			const qpersone = document.getElementsByClassName("quantita-persone");
			const qmaschi = document.getElementsByClassName("quantita-maschi");
			const qfemmine = document.getElementsByClassName("quantita-femmine");

			/* Ricavo i valori di tavoli Rimasti e li trasformo in numero  */

			var maxn = document.getElementById("ntavoli-normali").innerText * 1;
			var maxv = document.getElementById("ntavoli-vip").innerText * 1;

			/* Nascondo le scelte di Persone e Tipologie */

			for(let ids = 0; ids < 25; ids++){
				qpersone[ids].style.display = "none";
				qmaschi[ids].style.display = "none";
				qfemmine[ids].style.display = "none";
			};

			/* Funzioni per ricavare un numero random di prenotazione da 9 digiti */

			nprenotazione();

			function nprenotazione(){
				var npre = getRandomIntInclusive(000000000, 999999999);
				document.getElementById('ID-prenotazione').value= npre;
			}

			var value, valuepersone, tipologia, valtemp;

			/* Analisi Selettore Tipologia Tavoli */

			selectTipologia.addEventListener('change', (event) => {
				var tip = event.target.value;

				/* Azzero la quantità di tavoli scleti per corretta gestione variabili tavoli rimasti */

				document.getElementById('n-tav').value=0;

				/* Definisco che tipo di tavolo è scelto e di conseguenza quali quantità togliere */

				if(tip == "Tavolo Normale" ) {tipologia = 1;}
				if(tip == "Tavolo VIP" ) {tipologia = 2;}
			});

			/* Analisi Selettore Quantità Tavoli */

			selectTavoli.addEventListener('change', (event) => {
				value = event.target.value;

				/* Condizioni che vanno a modificare la quantità di tavoli */

				if (tipologia == 1){
					valtemp = maxn - value;
					document.getElementById('ntavolirimanenti').value= valtemp;
					document.getElementById('vtavolirimanenti').value= maxv;
				}

				if (tipologia == 2){
					valtemp = maxv - value;
					document.getElementById('ntavolirimanenti').value= maxn;
					document.getElementById('vtavolirimanenti').value= valtemp;
				}

				/* Condizioni che vanno a modificare la quantità di pesone selezionabili */

				if(value == 1){
					for(let o = 0; o < 10; o++){qpersone[o].style.display = "block";};
					for(let i = 5; i < 25; i++){qpersone[i].style.display = "none";}
				}

				if(value == 2){
					for(let o = 0; o < 10; o++){qpersone[o].style.display = "block";};
					for(let i = 10; i < 25; i++){qpersone[i].style.display = "none";}
				}

				if(value == 3){
					for(let o = 0; o < 15; o++){qpersone[o].style.display = "block";};
					for(let i = 15; i < 25; i++){qpersone[i].style.display = "none";}
				}

				if(value == 4){
					for(let o = 0; o < 20; o++){qpersone[o].style.display = "block";};
					for(let i = 20; i < 25; i++){qpersone[i].style.display = "none";}
				}

				if(value == 5){
					for(let o = 0; o < 25; o++){qpersone[o].style.display = "block";}
				};
			});

			/* Analisi Selettore Quantità Persone */

			selectPersone.addEventListener('change', (event) => {
				valuepersone = event.target.value;

				/* Azzero la quantità di m e f */

				document.getElementById('nmaschi').value=0;
				document.getElementById('nfemmine').value=0;

				/* Attivo la quantità di persone disponibili */

				for (let qm = 0; qm < valuepersone; qm++){
					qmaschi[qm].style.display = "block";
					qfemmine[qm].style.display = "block";
				};

				for (let nm = valuepersone; nm < 25; nm++){
					qmaschi[nm].style.display = "none";
					qfemmine[nm].style.display = "none";
				}
			});

			/* Analisi Selettore Quantità Maschi */

			selectMaschi.addEventListener('change', (event) => {
				var valuemaschi = event.target.value;
				var maxfem = valuepersone - valuemaschi;

				/* Definisco la quantità di femmine selezionabili */

				for (let mf = 0; mf < maxfem; mf++){
					qfemmine[mf].style.display = "block";
				};

				for (let nf = maxfem; nf < 25; nf++){
					qfemmine[nf].style.display = "none";
				};
			});

			/* Analisi Selettore Quantità Femmine */

			selectFemmine.addEventListener('change', (event) => {
				var valuefemmine = event.target.value;
				var maxmas = valuepersone - valuefemmine;

				/* Definisco la quantità di Maschi selezionabili */

				for (let mm = 0; mm < maxmas; mm++){
					qmaschi[mm].style.display = "block";
				};

				for (let nm = maxmas; nm < 25; nm++){
					qmaschi[nm].style.display = "none";
				};
			});

			/* Funzione numero randomico per la prenotazione */

			function getRandomIntInclusive(min, max) {
				min = Math.ceil(min);
				max = Math.floor(max);
				return Math.floor(Math.random() * (max - min + 1) + min);
			}
		</script>
	</body>
</html>
