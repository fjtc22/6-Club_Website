<?php
include 'functions.php';

$stmt = $pdo->query("SELECT * from evento")->fetchAll();

?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
			<title>Sio Cafe - Private</title>
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
			<a href="#"><i class="fas fa-sign-out-alt fa-2x"></i></a>
			<a href="index.php">
				<img src="assets/img/logos/logo.png" alt="Main_logo" height="50" id="logo">
			</a>
			<a href="index.php"><i class="fas fa-home fa-2x"></i></a>
		</nav>

		<!--- Private Section --->
		<section class="private">
			<header>Seleziona la Serata:</header>

			<?php foreach ($stmt as $row) { ?>

			<div class="card">
				<div class="card-items">
					<p><?php echo $row['nome']; ?></p>
				</div>

				<div class="card-items">
					<a href="lista.php?id=<?php echo $row['id']; ?>"><i class="fas fa-clipboard-list fa-2x"></i></a>
					<a href="update.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit fa-2x"></i></a>
					<button type="button" onClick="deleteme(<?php echo $row['id']; ?>)"><i class="fas fa-trash-alt fa-2x"></i></button>
				</div>
			</div>

			<?php } ?>

			<a href="new.php"><button id="b-new"><i class="fas fa-plus-circle fa-3x"></i></button></a>
		</section>

		<script type="text/javascript">
			function deleteme(delid){
				if(confirm("Do you want to Delete?")){
					window.location.href="delete.php?id=" + delid + '';
					return true;
				}
			}
		</script>
	</body>
</html>
