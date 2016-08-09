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
                $login = $_SESSION['login'];
            ?>

        <a href='user.php'><Button style='text-align:center;'>Ritorna nella tua area riservata</button></a><br><br>
        <?php
            echo "Tu sei: $login";
        ?>
        <p>Per ordinare delle pizze, compila il form qua sotto: (ogni campo è obbligatorio) </p>
        <form action="user_aggiunta_pizze.php" method="post">
        <table style="text-align:center;">
            <tr><td>giorno di consegna:</td><td>
            <?php             
                $date=getdate();
                $days=count_days();

                echo"<select name='day'>";
                for($count=$date['mday'];$count<=$days;$count++) {
                    echo"<option value='$count'>$count </option>";
                }
                echo"</select>";


                echo"<select name='months'>";
                for($count=$date['mon'];$count<=12;$count++) {
                    echo"<option value='$count'>$count </option>";
                }
                echo"</select>"; 

                echo"<select name='year'>        
                    <option value='$date[year]'>$date[year] </option>        
                </select>";
                $dbconn = db_connection();

                $year = $_POST['year'];
                $month = $_POST['months'];
                $day = $_POST['day'];
                $dateformat = $_POST['year'].$_POST['$month'].$_POST['$day'];
                echo "$dateformat";

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
                        echo"<option value='10'>10</option>";
                        echo"<option value='20'>20</option>";
                        echo"<option value='30'>30</option>";
                        echo"<option value='40'>40</option>";
                        echo"<option value='50'>50</option>";
                        echo"</select>";                        
                        
  ?></td></tr>
	        <tr><td>indirizzo consegna:</td><td><input type="text" name="indirizzoconsegna"></td></tr>
        </table>
        <br>
<?php
            try {
        $dbconn = db_connection();
        $statement = $dbconn->prepare('select crea_ordine(?,?,?,?)');
        $statement->execute(array($login,$dateformat,$_POST['oraconsegna'],$_POST['indirizzoconsegna']));
        } catch (PDOException $e) { echo $e->getMessage(); }
 ?>
        <br>
        <input type="submit" value="Continua con l'aggiunta delle pizze">
        </form>  
                     
               
        
    </body>
    
</html>        
