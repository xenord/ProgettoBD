<?php   
error_reporting(E_ALL & ~E_NOTICE);  
    
/*qui ci verranno messe le funzioni per la creazione di query*/    
    
    
    function db_connection()
    {
     $dbconn = new PDO('pgsql:host=dblab.dsi.unive.it;port=5432;dbname= a2014u73',' a2014u73','I.vSp.4Z');
     $dbconn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $dbconn;
    }

    function verifica_accesso() {
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location:index.php');
        }
    }


        
    function query_utenti_registrati($dbconn)
    {
            $stat=$dbconn->prepare('select * from utenti');
            $stat->execute();
            foreach($stat as $record) 
            {
                echo "<font face=arial> username: $record[login] nome: $record[nome] cognome: $record[cognome] indirizzo: $record[indirizzo] password: $record[password] </font><br>";     
            }
            
            return $stat;
    }
  
    function lista_pizze($dbconn)
    {
            $stat=$dbconn->prepare('select p.nome,p.prezzo, array_to_string(array_agg(m.nomeingrediente),?) as ingredienti from disponibilitaingredienti di,pizze p ,magazzino m where p.idpizza=di.idpizza and m.idingrediente=di.idingrediente group by p.nome,p.prezzo order by p.prezzo');
            
            $stat->execute(array(','));

            
            return $stat;
    }


    function cerca_pizze($dbconn, $parola) {
        $parola_con_wildcard = '%'.$parola.'%';
        
        if(!(empty($parola)))
        {

        $stat=$dbconn->prepare('select p.nome,p.prezzo, array_to_string(array_agg(m.nomeingrediente),?) as ingredienti from disponibilitaingredienti di,pizze p ,magazzino m where p.idpizza=di.idpizza and m.idingrediente=di.idingrediente and nome ilike ? group by p.nome,p.prezzo order by p.prezzo');
            
            $stat->execute(array(',',$parola_con_wildcard));
        return $stat;
        }
        
    }


    
    
    /*function inserisci_utente($dbconn)
    {
        $stat=$dbconn->prepare('insert into utenti (login,nome,cognome,indirizzo,password,numerotelefono) values(?,?,?,?,?,?)');
        $stat->execute(array($_POST['login'],$_POST['nome'],$_POST['cognome'],$_POST['indirizzo'],md5($_POST['password']),$_POST['telefono']));
        return $stat; 
        
        create or replace function crea_utente(log text,name text,surname text,address text,pass text,tel text) returns void as $$
  insert into utenti (login,nome,cognome,indirizzo, password,numerotelefono) values (log,name,surname,address,md5(pass),tel);
$$ language sql;       
    
      
    
    }*/
    
        function restituisci_ingredienti($dbconn)
    {
        $stat=$dbconn->prepare('select * from magazzino');
        $stat->execute();
        return $stat;         
         
    
    }
    
     function prezzo_totale($dbconn)
    {
        $stat=$dbconn->prepare('select * from magazzino');
        $stat->execute();
        return $stat;         
         
    
    }
    
    
        function dati_utenti_registrati($dbconn)
    {
            $stat=$dbconn->prepare('select nome,cognome,indirizzo,login,numerotelefono from utenti where login=?');
            $stat->execute(array($_SESSION['login']));
            foreach($stat as $record) 
            {
                echo "<font face=arial> <br>username: $record[login] <br> nome: $record[nome]<br> cognome: $record[cognome]<br> indirizzo: $record[indirizzo] <br> numero di telefono: $record[numerotelefono]</font><br>";     
            }
            
            return $stat;
    }
    
        function stampa_ordini($dbconn)
    {
            $stat=$dbconn->prepare('select nome,cognome,indirizzo,login,numerotelefono from utenti where login=?');
            $stat->execute(array($_SESSION['login']));
            foreach($stat as $record) 
            {
                echo "<font face=arial> <br>username: $record[login] <br> nome: $record[nome]<br> cognome: $record[cognome]<br> indirizzo: $record[indirizzo] <br> numero di telefono: $record[numerotelefono]</font><br>";     
            }
            
            return $stat;
    }
    


    

?>
