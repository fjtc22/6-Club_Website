<?php
  $host = 'eu-cdbr-west-01.cleardb.com';
  $user = 'ba7410aff0394a';
  $password = '0eb84005';
  $db_name = 'heroku_966eb69976780bb';

  //SET DSN
  $dsn = 'mysql:host='. $host .';dbname='. $db_name;

  //CREATE PDO INSTANCE
  try{
   return $pdo = new PDO($dsn, $user, $password);
  }

  catch(PDOException $exception){
	  // If there is an error with the connection, stop the script and display the error.
	  exit('Failed to connect to database!');
  }
?>
