<?php  
    /*Salva nel database le pizze scelte per l'ordine in corso e chiede se aggiungere altre pizze o completare l'ordinazione.*/
    require "../functions.php";
    verifica_accesso();
?>
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
                $state = $dbconn->prepare('select idordine from ordini where login = ?');
                $state->execute(array($_SESSION['login']));
                foreach ($state as $iter) {
                    $ido = $iter['idordine'];
                    break;
                }
                $check = $dbconn->prepare('select count(*) from pizzecontenute where idordine = ? and idpizza = ?');
                $check->execute(array($ido,$_POST['idpizza']));
                foreach ($check as $check_o) {
                    if ($check_o[0] == 1) {
                        echo "Stai selezionando più volte lo stesso tipo di pizza";
                    }
                    else {
                $view = view_ingrediente_con_meno_quantita($dbconn, $_POST['idpizza']);
                foreach ($view as $key) {
                        $min = $key['quantita'];
                }
                echo "Ingrediente con minore  quantità di tutti ha valore: ".$min;
                echo "<br></br>";
                if ($min <= 0) {
                    echo "Non ci sono ingredienti sufficienti per nemmeno una pizza :'(";
                    echo "<br></br>";
                }
                else if (($_POST['numeropizze'] > $min) && ($min > 0)) {
                    $statem = $dbconn->prepare('select inserisci_pizza_in_ordine(?,?,?)');
                    $statem->execute(array($_POST['idpizza'],$ido,$min));
                    $quantita = ingredienti_disponibili_per_pizza($dbconn, $_POST['idpizza']);
                    foreach ($quantita as $quantitaingredienti) {
                        $idingredienteperpizza = $quantitaingredienti[0];
                        $quantitaingredienteperpizza = $quantitaingredienti[1];
                        aggiorna_magazzino($dbconn,$quantitaingredienteperpizza-$min,$idingredienteperpizza);
                    }
                    echo "Putroppo gli ingredienti non sono sufficienti per fare tutte le pizze.";
                    echo "<br></br>";
                    echo "Verranno aggiunte"." ".$min." "."pizze al database anzichè"." ".$_POST['numeropizze'];
                    echo "<br></br>";
                }
                else {
                    $statement = $dbconn->prepare('select inserisci_pizza_in_ordine(?,?,?)');
                    $statement->execute(array($_POST['idpizza'],$ido,$_POST['numeropizze']));
                    $quantita = ingredienti_disponibili_per_pizza($dbconn, $_POST['idpizza']);
                    foreach ($quantita as $quantitaingredienti) {
                        $idingredienteperpizza = $quantitaingredienti[0];
                        $quantitaingredienteperpizza = $quantitaingredienti[1];
                        aggiorna_magazzino($dbconn,$quantitaingredienteperpizza-$_POST['numeropizze'],$idingredienteperpizza);
                    }
                    echo "Le Pizze sono state aggiunte all'ordine!";
                    echo "<br></br>";
                }
                }
            }
            } catch (PDOException $e) { echo $e->getMessage(); }
        ?>
        <br> </br>
        <p> <a href="user_aggiunta_pizze.php">Aggiungi un'altra pizza all'ordine</a> </p>
        <p> <a href="user.php">Completa l'ordine </a></p>
        
    </body>
</html>
        