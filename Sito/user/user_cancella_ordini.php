<?php
    require "../functions.php";
    verifica_accesso();
    try {
        $dbconn = db_connection();
        $statement = $dbconn->prepare('delete from pizzecontenute where idordine=?');
        $statement->execute(array($_GET['ido']));
        $rec = $statement->fetch();
        $state = $dbconn->prepare('select cancella_ordine(?,?)');
        $state->execute(array($_SESSION['login'],$_GET['ido']));
        header('Location:user_lista_ordini.php?msg=cancellazionesavvenuta');
    } catch (PDOException $e) { echo $e->getMessage(); }
?>