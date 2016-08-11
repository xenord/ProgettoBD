<?php  
/*Salva nel database le pizze scelte per l'ordine in corso e chiede se aggiungere altre pizze o completare l'ordinazione.*/
require "../functions.php";
  verifica_accesso();
  ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Ordinazione pizze</title>
</head>
<body>
<h1>Scelta pizza</h1>
<h3>E' possibile scegliere solo un tipo di pizza per volta</h3>

 <?php
  try {
	$dbconn = db_connection();
  $state = $dbconn->prepare('select IDordine from ordini where login = ?');
  $state->execute(array($_SESSION['login']));
	$statement = $dbconn->prepare('select inserisci_pizza_in_ordine(?,?,?)');
  foreach ($state as $key) {
      $statement->execute(array($_POST['idpizza'],$key['idordine'],$_POST['numeropizze'])); 
  }
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
  <p>La pizza che hai scelto &egrave; stata aggiunta al tuo ordine!</p>
<br> </br>
<p> <a href="user_aggiunta_pizze.php">Aggiungi un'altra pizza all'ordine</a> </p>
<p> <a href="user.php">Completa l'ordine </a></p>
</body>
</html>
