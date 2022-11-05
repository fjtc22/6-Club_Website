<?php
session_start();
include 'functions.php';

$message = '';

if(isset($_POST['login'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		$message = '<label>All fields are required</label>';
	}
	else {
		$query = 'SELECT * FROM utenti WHERE username = :username AND password = :password';
		$stmt = $pdo->prepare($query);
		$stmt->execute(array('username' => $_POST['username'], 'password' => $_POST['password']));

		$count = $stmt->rowCount();

		if ($count > 0){
			$_SESSION['username'] = $_POST['username'];
			header("location:private.php");
		}
		else{
			echo '<script type="text/javascript">';
			echo 'alert("Wrong Data")';
			echo '</script>';
		}
	}
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
			<title>Sio Cafe - Login</title>
			<link href="assets/css/normalize.css" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="assets/js/modernizr.js"></script>
			<link href="assets/css/style_private.css" rel="stylesheet" type="text/css">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body>
		<!--- Nav Section --->
		<nav>
			<a href="index.php">
				<img src="assets/img/logos/logo.png" alt="Main_logo" height="50" id="logo">
			</a>
		</nav>

		<!--- Login Section --->
		<section class="login">
			<div class="warp-login">
				<header>Login</header>
				<form method="post">
					<label for="username">Username</label>
					<br>
					<input type="text" id="username" name="username">
					<br>
					<label for="password">Password</label>
					<br>
					<input type="password" id="password" name="password">
					<br>
					<input type="submit" id="b-submit" name="login" value="Login">
				</form>
			</div>
		</section>

	</body>
</html>
