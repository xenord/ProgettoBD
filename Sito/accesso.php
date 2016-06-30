<!DOCTYPE html> 
<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
    </head>

    
    <body style="background-color:skyblue;">
    
        <h1 style="text-align:center;font-family:arial;"> Under construction (login effettuato con successo)</h1>
        
        <a href="index.php"><Button style="text-align:center;font-family:arial;">Ritorna alla pagina principale</button></a>
    
<?php
require "functions.php";


if(!(isset($_POST['Accedi'])))
{

    if (empty($_POST['login']) || empty($_POST['password'])) {
        header('Location:index.php?errore=campivuotilogin');
  
    }


    else
    {
        if(is_numeric($_POST['telefono']))
        {
            try
            {
                $dbconn = db_connection();
                $statement = $dbconn->prepare('select credenziali_valide(?, ?)');
                $statement->execute(array($_POST['login'],$_POST['password']));
                $rec = $statement->fetch();
                  if ($rec[0]==1) 
                    {
                        header('Location:accesso.php');
                        session_start();                            
                        $_SESSION['login'] = $_POST['login']; 
                    } 
                  else 
                  {
                    header('Location:index.php?errore=credenzialiinvalide');
                  }   
    
            }
            catch (PDOException $e) { echo $e->getMessage(); }
         }  
         else
         {
            echo "il numero di telefono deve essere formato solo da numeri compresi tra 0 e 9 (ma non è così)";
         
         }   
    }

}





echo "<p style=font-family:arial;><br>I tuoi dati di accesso sono:<br> login=".$_POST['login']."<br> password=".$_POST['password']."</p>";

?>


    
    </body>
    </head>
</html>
