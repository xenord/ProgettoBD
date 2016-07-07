<!DOCTYPE html> 
<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
    </head>

    
    <body style="background-color:skyblue;font-family:arial;">
    
        <h1 style="text-align:center;"> Under construction (pagina amministratore)</h1>
        
                <?php  
            require "functions.php"; 
            verifica_accesso();
            
                
        ?>
                  <h2>Benvenuto nella pagina di amministratore ecco quello che puoi fare:</h2>
  <ul>
    <li> <a href="lista_ordini.php"><Button style="text-align:center;">Elencare tutti gli ordini effettuati</button></a> </li><br>
    <li> <a href="crea_ordine.php"><Button style="text-align:center;">Creare un nuovo ordine</button></a> </li><br>
    <li> <a href="crea_ordine.php"><Button style="text-align:center;">Cancellare un' ordine</button></a> </li><br>
        <li> <a href="pizze.php"><Button style="text-align:center;">Visualizzare le pizze(potrebbe non servire)</button></a> </li><br>
    <li> <a href="personale.php">Vedere i tuoi dati personali(potrebbe non servire)</a> </li><br>
    <li> <a href="logout.php"><Button style="text-align:center;">Effettuare il logout</button></a></li><br>
  </ul>
        
            
    </body>
    </head>
</html>
