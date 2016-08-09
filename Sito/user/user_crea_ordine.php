<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
    </head>

    
    <body style="background-color:skyblue;font-family:arial;">
    
        <h1 style="text-align:center;"> crea un'ordinazione(under construction)</h1>   
                      <?php  
            require "../functions.php"; 
            verifica_accesso();
            
                
        ?>
        <a href='user.php'><Button style='text-align:center;'>Ritorna nella tua area riservata</button></a><br><br>
        
               <p>Per ordinare delle pizze, compila il form qua sotto: (ogni campo è obbligatorio) </p>
        
        <form action="user_aggiunta_ordine.php" method="post">
      
        <table style="text-align:center;">
            <tr><td>giorno di consegna:</td><td>
  
  <?php 
                        
                        $date=getdate();
                        $days=count_days();
                        echo"<select name='days'>";
                        for($count=$date['mday'];$count<=$days;$count++)
                        {
                            echo"<option value='$count'>$count </option>";
                        }    
                        echo"</select>";
                        
                        echo"<select name='months'>";
                        for($count=$date['mon'];$count<=12;$count++)
                        {
                            echo"<option value='$count'>$count </option>";
                        }
                        echo"</select>";
                        
                        echo"<select name='year'>";
                        
                        echo"<option value='$date[year]'>$date[year] </option>";
                        
                        echo"</select>";
                        
  ?>
    
            <tr><td>ora di consegna:</td><td>  <?php 
                        
                                               
                        echo"<select name='hours'>";
                        for($count=18;$count<=22;$count++)
                        {
                            echo"<option value='$count'>$count </option>";
                        }    
                        echo"</select>";
                        
                        echo"<select name='minutes'>";
                        echo"<option value='00'>00</option>";
                        echo"<option value='30'>30</option>";
                        echo"</select>";
                        
                        
  ?></td></tr>
            <tr><td>indirizzo consegna:</td><td><input type="text" name="indirizzo"></td></tr>
            
        </table>
        
        
        <?php
            if ($_GET['errore']=='campivuoti')
        {
            echo "<font color=crimson><b>Non hai inserito l'indirizzo</b></font><br>";
        }
        ?>
        
        <br>
        <input type="submit" value="Continua con l'aggiunta delle pizze" style="font-family:arial;">
        </form>  
                     
               
        
    </body>
    
</html>        
