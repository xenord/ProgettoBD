<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
    </head>

    
    <body style="background-color:skyblue;font-family:arial;">
    
        <h1 style="text-align:center;"> crea un'ordinazione(under construction)</h1>   
                      <?php  
            require "functions.php"; 
            verifica_accesso();
            
                
        ?>
        
               <p>Per ordinare delle pizze, compila il form qua sotto: (ogni campo è obbligatorio) </p>
        
        <form action="user.php" method="post">
      
        <table style="text-align:center;">
            <tr><td>giorno di consegna:</td><td><input type="text" name="cognome"></td></tr>
	        <tr><td>ora di consegna:</td><td><input type="text" name="indirizzo"></td></tr>
	        <tr><td>indirizzo consegna:</td><td><input type="text" name="telefono"></td></tr>
        </table>
        <input type="submit" value="ordina" style="font-family:arial;">
        </form>  
        
    
        
        
        
        
    </body>
    
</html>        
