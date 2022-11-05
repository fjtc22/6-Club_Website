<?php
include 'functions.php';

// Check that the contact ID exists
$stmt = $pdo->prepare('DELETE FROM evento WHERE id = ?');
$stmt->execute([$_GET['id']]);
header("Location: private.php");
?>
