<!DOCTYPE html> 
<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
        <?php  
            require "../functions.php"; 
            verifica_accesso();
        

        
        if($_GET['errore']=='erroretelefono')
        {
            echo "<font color=crimson><b>Il numero di telefono inserito non è valido</b></font><br>";
        }
        
            $dbconn = db_connection();
            $statement = $dbconn->prepare('select * from utenti where login = ?');
            $statement->execute(array($_GET['usr']));
            $rec = $statement->fetch();
            $admin= $rec['admin']==1 ? "Si":"No";
        ?>
    </head>
    
    <body style="background-color:skyblue;font-family:arial;">
    
    <h1 style="text-align:center;">Modifica i dati di <?php echo $_GET['usr']?>:</h1>
        
    <a href='admin_gestione_utenti.php'><Button style='text-align:center;'>Ritorna alla pagina di gestione degli utenti</button></a><br><br>
    
    <form action="" method="post">
      
        <table style="text-align:center;">
            <tr><td>Nome:</td><td><input type="text" name="nome" value='<? echo $rec['nome'];?>' ></td></tr>
	        <tr><td>Cognome:</td><td><input type="text" name="cognome" value='<? echo $rec['cognome'];?>' ></td></tr>
	        <tr><td>Indirizzo:</td><td><input type="text" name="indirizzo" value='<? echo $rec['indirizzo'];?>' ></td></tr>
	        <tr><td>Telefono:</td><td><input type="text" name="telefono" value='<? echo $rec['numerotelefono'];?>' ></td></tr>
	        <tr><td>Username:</td><td><input type="text" name="login" value='<? echo $rec['login'];?>' ></td></tr>
            <tr><td>Admin:</td><td>
                                    <select name='admin'>
                                        <option value='<? echo $rec['admin'];?>'> <? echo $admin; ?>
                                        </option>
                                        <option value='<? echo !$rec['admin'];?>'> <? if(!$rec['admin']){ echo"Si";} else {echo"No";} ?>
                                        </option>
                                        
                                    </select>
                                    </td></tr>
        </table>
        <input type="submit" name="modifica" value="Modifica" style="font-family:arial;">
        </form>
        
        <?php
                if(isset($_POST['modifica']))
                {   
                   if((!preg_match("/^[0-9]*$/",$_POST['telefono'])))
                    {
                        header('Location:modifica_utente.php?errore=erroretelefono');
                    }
                    
                    else
                    {
                    $stat = $dbconn->prepare('select modifica_utente(?,?,?,?,?,?)');  
                    $stat->execute(array($_POST['login'],$_POST['nome'],$_POST['cognome'],$_POST['indirizzo'],$_POST['password'],$_POST['telefono']));
                    header('Location:admin_gestione_utenti.php?msg=utentemodificato');
                    }
                    
                }
        
        ?>
           
</body>
</html>    
