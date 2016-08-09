<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
    </head>

    
    <body style="background-color:skyblue;font-family:arial;">
    
        <h1 style="text-align:center;"> aggiunta pizze(under construction)</h1>   
                      <?php  
            require "../functions.php"; 
            verifica_accesso();
            if (empty($_POST['indirizzo']))
        {
            header('Location:crea_ordine.php?errore=campivuoti');
        }
                
        ?>
        <a href='crea_ordine.php'><Button style='text-align:center;'>Rifai l'ordine</button></a><br><br>
        
               <p>Seleziona una pizza e poi decidi la quantità modificando la casella di testo </p>
               
               <?php
 
                    
                    $year = $_POST['year'];
                    $month = $_POST['months'];
                    $day = $_POST['days'];
                    $dateformat = $day."-".$month."-".$year;
                    /*echo $dateformat;
                    echo "<br>";*/
                
                    $minute=$_POST['minutes'];
                    $hour=$_POST['hours'];
                    $timeformat=$hour.":".$minute.":"."00";
                    /*echo $timeformat;*/
                    echo "Riepilogo ordine: <br>"."Data di consegna:".$dateformat."<br>"."Ora di consegna:".$timeformat."<br>Indirizzo:".$_POST['indirizzo'];
 
                    try {

                        $dbconn = db_connection();
                        $statement = $dbconn->prepare('select crea_ordine(?,?,?,?)');
                        $statement->execute(array($_SESSION['login'],$dateformat,$timeformat,$_POST['indirizzo']));
                    } catch (PDOException $e) { echo $e->getMessage(); }
                    header('Location: user_aggiunta_pizze.php');
               ?>
               
               
</html>               
