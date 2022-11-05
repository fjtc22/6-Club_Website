<?php
include 'functions.php';

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * from prenotazioni WHERE id_prenotazione = $id")->fetchAll();



?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sio Cafe - Lista</title>
		<link href="assets/css/normalize.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="assets/js/modernizr.js"></script>
		<link href="assets/css/style_private.css" rel="stylesheet" type="text/css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body>
		<!--- Nav Section --->
		<nav>
			<a href="private.php"><i class="fas fa-arrow-circle-left fa-2x" id="back"></i></a>
			<a href="index.php">
				<img src="assets/img/logos/logo.png" alt="Main_logo" height="50" id="logo">
			</a>
			<a href="index.php"><i class="fas fa-home fa-2x"></i></a>
		</nav>

		<!--- List Section --->
		<section class="list">
			<header>Lista delle Prenotazioni</header>
			<table>
				<tr>
					<th>N° Prenotazione</th>
					<th>Nome</th>
					<th>Cognome</th>
					<th>N° Tel</th>
					<th>Tipo Tav</th>
					<th>N° Tav</th>
					<th>N° Per</th>
					<th>+ Per</th>
					<th>N° F</th>
					<th>N° M</th>
				</tr>

				<tr>
					<td>123456789</td>
					<td>Franco</td>
					<td>Ticona</td>
					<td>3496931857</td>
					<td>vip</td>
					<td>3</td>
					<td>14</td>
					<td>3</td>
					<td>7</td>
					<td>8</td>
				</tr>

				<?php foreach ($stmt as $row) { ?>

				<tr>
					<td></td>
					<td><?php echo $row['nome']; ?></td>
					<td><?php echo $row['cognome']; ?></td>
					<td><?php echo $row['telefono']; ?></td>
					<td><?php echo $row['tipotavolo']; ?></td>
					<td><?php echo $row['tavolo']; ?></td>
					<td><?php echo $row['persone']; ?></td>
					<td><?php echo $row['aggpersone']; ?></td>
					<td><?php echo $row['femmine']; ?></td>
					<td><?php echo $row['maschi']; ?></td>
				</tr>


				<?php } ?>
			</table>
		</section>
	</body>
</html>
