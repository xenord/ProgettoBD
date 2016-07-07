<!DOCTYPE html> 
<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
        <?php  
            require "functions.php"; 
            verifica_accesso();    
        ?>
    </head>
    
    <body style="background-color:skyblue;font-family:arial;">
    
        <h1 style="text-align:center;">Lista ordini fatti dagli utenti</h1>
        
        <a href='admin.php'><Button style='text-align:center;'>Ritorna alla pagina di amministrazione</button></a>
         
        <table border=1 style='width:100%;text-align:center;font-size:18px;border-collapse: collapse;'>
             <tr>
                <th>ID:</th>
                <th>Username:</th>
                <th>Giorno di consegna:</th>
                <th>Ora di consegna:</th> 
                <th>Indirizzo di consegna:</th>            
            </tr>
             <tr>
                    <?php  
                    
                         $dbconn = db_connection();
                         
                         $res=lista_utenti($dbconn); 
                         
                         foreach($res as $rec)
                            {
                            echo"<tr><td>$rec[IDordine]</td><td>$rec[utente]</td><td>$rec[giornoconsegna]</td><td>$rec[oraconsegna]</td><td>$rec[indirizzoconsegna]</td></tr>";
                        
                            }
                    ?>                             
            </tr>
        </table>   
    </body>
</html>
