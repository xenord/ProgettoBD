<!DOCTYPE html> 
<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
    </head>

    
    <body style="background-color:skyblue;">
    
        <h1 style="text-align:center;font-family:arial;"> Under construction (registrazione effettuata con successo)</h1>
        
        <a href="index.php"><Button style="text-align:center;font-family:arial;">Ritorna alla pagina principale</button></a>
        
        
<?php
require "functions.php";


if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    if(!(isset($_POST['Registrazione'])))
    {
        /*echo"bottone premuto";*/
        
        if (empty($_POST['login']) ||empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['indirizzo']) || empty ($_POST['password']) ||empty($_POST['telefono']))
        {
            header('Location:index.php?errore=campivuoti');
        }
        
        else
        {
                try{  
        $dbconn = db_connection();
        $statement = $dbconn->prepare('select count (*) from utenti where login = ?');
        $statement->execute(array($_POST['login']));
        $rec = $statement->fetch();
        if ($rec[0] == 1) 
        {               
            header('Location:registrazione.php?errore=utenteesistente');
        }
        else{
            
            session_start();
            $_SESSION['login'] = $_POST['login'];
            /*$stat = $dbconn->prepare('select crea_utente(?,?,?,?,?,?,?)');
            $stat->execute(array($_POST['username'],$_POST['nome'],$_POST['cognome'],$_POST['indirizzo'],$_POST['password'],F,$_POST['telefono']));*/
            inserisci_utente($dbconn);
                      
            echo "<font color=darkgreen face=arial><b>Registrazione effettuata</b></font><br>";
            /*header('Location:index.php=registrazioneffettuata');*/
                        
            }
        
        } catch (PDOException $e) { echo $e->getMessage(); }
        }
    }
    
    else
    {
        echo"non è stato premuto";
    
    }
}




 echo "<p style=font-family:arial;><br>Le tue credenziali sono:<br>login=".$_POST['login']."<br>nome=".$_POST['nome']."<br> cognome=".$_POST['cognome']."<br> indirizzo=".$_POST['indirizzo']."<br> password=".$_POST['password']."<br> telefono=".$_POST['telefono']."</p>";

?>


    
    </body>
    </head>
</html>
