<?php  
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
    <p>Scegliere una pizza da inserire nell'ordine:</p>
    <?php
        try {
            $dbconn = db_connection();
            $st = $dbconn->prepare('select idpizza, nome, prezzo from pizze');
            $st->execute();
            echo "<form action='esegui_scelta.php' method='post'>";
            foreach($st as $rec) {
                echo "<input type='radio' name='idpizza' value='$rec[idpizza]'>$rec[idpizza] $rec[nome], $rec[prezzo] euro<br>";
            }
            echo"<br> </br>";
            echo"<tr><td>Quantit&agrave;: </td><td><input type='int' name='numeropizze' value='1'></td></tr>";
            echo"<input type='submit' value='Procedi'>";
            echo "</form>";
        } catch (PDOException $e) { echo $e->getMessage(); }
    ?>
    </body>
</html>