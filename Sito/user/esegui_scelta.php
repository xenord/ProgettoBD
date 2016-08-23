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
                $state = $dbconn->prepare('select IDordine from ordini where login = ?');
                $state->execute(array($_SESSION['login']));
        	    $statement = $dbconn->prepare('select inserisci_pizza_in_ordine(?,?,?)');
                $quantita = ingredienti_disponibili_per_pizza($dbconn, $_POST['idpizza']);
                $flagpizze = 0;
                $flag = 0;
                $flagbreak=1;/*flagbreak lo uso per evitare il break*/
                for($counter = 0; $counter < $_POST['numeropizze']; $counter++) { 
                    if($flagbreak)
                    {
                        foreach ($quantita as $quantitaingredienti) {
                            $idingredienteperpizza = $quantitaingredienti[0];
                            $quantitaingredienteperpizza = $quantitaingredienti[1];
                            if ($quantitaingredienteperpizza > 0) {
                                // flag = 1 perchè se gli ingredienti permettono di fare almeno una di quel tipo di pizza
                                // allora viene inserita nel database
                                // se il flag non dovesse andare MAI a 1 allora vuol dire che non ci sono ingrediente nemmeno per fare una pizza
                                // di quel tipo
                                $flag = 1;
                                // flagpizze conta le pizze che gli ingredienti permettono di fare
                                $flagpizze++;
                                aggiorna_magazzino($dbconn,$quantitaingredienteperpizza-1,$idingredienteperpizza);
                            }
                            else {
                                echo "<p>Non ci sono abbastanza ingredienti per fare questa pizza</p>";
                                $flagbreak=0;
                            }
                            $quantita = ingredienti_disponibili_per_pizza($dbconn, $_POST['idpizza']);
                        }
                    }
                    if ($flag == 1) {
                    foreach ($state as $key) {
                        $statement->execute(array($_POST['idpizza'],$key['idordine'],$flagpizze));
                    }
                    echo "<p>Hai aggiunto".$flagpizze."pizza/e al tuo ordine!</p>";
                }
            } catch (PDOException $e) { echo $e->getMessage(); }
        ?>
        <br> </br>
        <p> <a href="user_aggiunta_pizze.php">Aggiungi un'altra pizza all'ordine</a> </p>
        <p> <a href="user.php">Completa l'ordine </a></p>
        
    </body>
</html>
