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
 <?php
  try {
	$dbconn = connessione();
	$st = $dbconn->prepare('select nuova_pizzeordinata(?,?,?)');
	$st->execute(array($_POST['numeropizze'],$_SESSION['codordine'],$_POST['pizza']));
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
  <p>La pizza che hai scelto &egrave; stata aggiunta al tuo ordine!</p>
<br> </br>
<p> <a href="user_aggiunta_pizze.php">Aggiungi un'altra pizza all'ordine</a> </p>
<p> <a href="user.php">Completa l'ordine </a></p>
</body>
</html>
