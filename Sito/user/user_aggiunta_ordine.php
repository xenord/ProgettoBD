<?php  
    require "../functions.php"; 
    verifica_accesso();
    if (empty($_POST['indirizzo'])) {
        header('Location:user_crea_ordine.php?errore=campivuoti');
    }

    $year = $_POST['year'];
    $month = $_POST['months'];
    $day = $_POST['days'];
    $dateformat = $year."-".$month."-".$day;

    $minute=$_POST['minutes'];
    $hour=$_POST['hours'];
    $timeformat=$hour.":".$minute.":"."00";
    try {
        $dbconn = db_connection();
        $statement = $dbconn->prepare('select crea_ordine(?,?,?,?)');
        $statement->execute(array($_SESSION['login'],$dateformat,$timeformat,$_POST['indirizzo']));
        header('Location: user_aggiunta_pizze.php');
    } catch (PDOException $e) { echo $e->getMessage(); }
?>              
