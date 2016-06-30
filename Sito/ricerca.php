<!DOCTYPE html> 
<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
    </head>

    
    <body style="background-color:skyblue;">
    
        <h1 style="text-align:center;font-family:arial;"> Under construction (Cerca pizze)</h1>
        
        <a href="index.php"><Button style="text-align:center;font-family:arial;">Ritorna alla pagina principale</button></a>
            
            <table border=1 style='width:100%;text-align:center;font-family:arial;font-size:18px;border-collapse: collapse;'>
             <tr>
                <th>Nome:</th>
                <th>Prezzo:</th>            
            </tr>
             <tr>    
        
<?php
require "functions.php";
/*query di ricerca*/
try
{

    $dbconn=db_connection();

    echo $_GET['pizzasearch'];

    $ris=cerca_pizze($dbconn, $_POST['pizzasearch']);

    foreach($ris as $rec)
    {
        echo"<tr><td>$rec[nome]<br>\nIngredienti:$rec[ingredienti]</td><td>$rec[prezzo] euro </td></tr>";
    /*echo "$rec[nome]$rec[ingredienti]$rec[prezzo]";*/


    }
}catch (PDOException $e) { echo $e->getMessage(); }

?>
            </tr>
        </table> 

    
    </body>
    </head>
</html>
