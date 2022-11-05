<?php

include 'functions.php';

if(isset($_GET['id'])){
	if(isset($_POST['submit'])){

		$nome = $_POST['nome-serata'];
		$descrizione = $_POST['descrizione-serata'];
		$costoNormale = $_POST['costo-tav1'];
		$costoVip = $_POST['costo-tav2'];

		//Query for insertion
		$data = [
			'nome' => $nome,
			'descrizione' => $descrizione,
			'costoNormale' => $costoNormale,
			'costoVip' => $costoVip,
			'id' => $_GET['id'],
		];

		$sql = "UPDATE evento SET nome=:nome, descrizione=:descrizione, costoNormale=:costoNormale, costoVip=:costoVip WHERE id=:id";
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
			<title>Sio Cafe - Update</title>
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
			<a href="private.php"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
			<a href="index.php">
				<img src="assets/img/logos/logo.png" alt="Main_logo" height="50" id="logo">
			</a>
			<a href="index.php"><i class="fas fa-home fa-2x"></i></a>
		</nav>

		<!--- Update Section --->
		<section class="new-page">
			<header>Modifica sertata:</header>

			<form enctype="multipart/form-data" method="post" action="update.php?id=<?php echo $_GET['id']; ?>">
				<label for="nome-serata">Nome della Serata:</label>
				<input type="text" id="nome-serata" name="nome-serata" value="<?=$eventi['nome']?>">

				<label for="descrizione-serata">Descrizione della Serata:</label>
				<textarea id="descrizione-serata" name="descrizione-serata" rows="5" cols="33"><?=$eventi['descrizione']?></textarea>

				<hr>

				<label for="costo-tav1">Costo Tavolo Normale:</label>
				<input type="number" id="costo-tav1" name="costo-tav1" value="<?=$eventi['costoNormale']?>">

				<label for="num-tavn">Quantità tavoli Normali:</label>
				<input type="number" id="num-tavn" name="num-tavn">

				<label for="costo-tav2">Costo Tavolo VIP:</label>
				<input type="number" id="costo-tav2" name="costo-tav2" value="<?=$eventi['costoVip']?>">

				<label for="num-tavv">Quantità tavoli VIP:</label>
				<input type="number" id="num-tavv" name="num-tavv">

				<hr>

				<label for="img-card">Immagine Card:</label>
				<input type="file" class="in-file" id="img-card" name="img-card" accept="image/*">

				<label for="img-logo">Immagine Logo:</label>
				<input type="file" class="in-file" id="img-logo" name="img-logo" accept="image/*">

				<hr>

				<label for="gallery">Immagini Galleria:</label>

				<div class="grid" id="gallery">
					<div class="item">
						<header>Immagine 1</header>
						<input type="file" class="in-file" id="img-gallery-1" name="img-gallery-1" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 2</header>
						<input type="file" class="in-file" id="img-gallery-2" name="img-gallery-2" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 3</header>
						<input type="file" class="in-file" id="img-gallery-3" name="img-gallery-3" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 4</header>
						<input type="file" class="in-file" id="img-gallery-4" name="img-gallery-4" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 5</header>
						<input type="file" class="in-file" id="img-gallery-5" name="img-gallery-5" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 6</header>
						<input type="file" class="in-file" id="img-gallery-6" name="img-gallery-6" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 7</header>
						<input type="file" class="in-file" id="img-gallery-7" name="img-gallery-7" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 8</header>
						<input type="file" class="in-file" id="img-gallery-8" name="img-gallery-8" accept="image/*">
					</div>

					<div class="item">
						<header>Immagine 9</header>
						<input type="file" class="in-file" id="img-gallery-9" name="img-gallery-9" accept="image/*">
					</div>
				</div>

				<label for="maps">Mappe Sale:</label>
				<div class="maps" id="maps">
					<div class="box-map">
						<header>Mappa Esterno</header>
						<input type="file" class="in-file" id="map-1" name="map-1" accept="image/*">
					</div>

					<div class="box-map">
						<header>Mappa Interna</header>
						<input type="file" class="in-file" id="map-2" name="map-2" accept="image/*">
					</div>
				</div>

				<input type="submit" name="submit" id="b-submit" value="Modifica">
			</form>
		</section>
	</body>
</html>
