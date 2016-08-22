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
                         
                         $res=lista_ordini($dbconn); 
                         
                         foreach($res as $rec)
                            {
                            echo"<tr><td>$rec[idordine]</td><td>$rec[login]</td><td>$rec[giornoconsegna]</td><td>$rec[oraconsegna]</td><td>$rec[indirizzoconsegna]</td></tr>";
                            
                            }
                    ?>       
          <br><br>          
          <form action="pizze_ordinate.php" method="post">
            <table style="text-align:center;">
            <p>Visualizza le pizze ordinate selezionando il numero dell'ordine:</p>
	        <tr><td>Numero ordine:</td></tr><tr><td>
	        <select name="numordine">
	        
	        	              <?php 
	                                 
	                     $dbconn = db_connection();
                         
                         $res=lista_ordini($dbconn); 
	                        foreach($res as $rec)
                            {   
                                if($rec['login']!=$_SESSION['login'])
                                {
                                echo"<option value='$rec[idordine]'>$rec[idordine]</option>";
                                }
                        
                            }
                            
                ?> 
               
           </select>      
            </td>
            </tr>
        </table>
        <input type="submit" value="Visualizza le pizze ordinate" style="font-family:arial;">
        </form>
                                          
            </tr>
        </table>   
    </body>
</html>
