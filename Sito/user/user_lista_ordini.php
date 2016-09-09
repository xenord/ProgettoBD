<!DOCTYPE html>
<html lang="it">

<!-- Meta e CSS -->
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Progetto Basi di Dati, pizzeria online">
    <meta name="author" content="Giacomo Ulliana, Francesco Benetello, Federico Carraro">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/personal.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <!-- Titolo -->
    <title>Elenco ordini</title>
</head>


<body>
    <?php  
        require "../functions.php"; 
        verifica_accesso();
    ?>

<!-- Menu di navigazione -->
<nav class="navbar-default" id="menu">
    <div class="col-lg-12 block-center" style="text-align:center;">
        <h1> Pizzeria Online - Progetto di Basi di Dati </h1>
    </div>
    
    <div class="navbar-header hidden-print">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../logout.php">Logout</a>
    </div>


    <!-- MENU DI NAVIGAZIONE-->
    <div class="navbar-collapse collapse ">
        <ul class="nav navbar-nav">

            <!-- Catalogo pizze -->
            <li><a href="user.php">Area Riservata</a></li>
            <li><a href="user_pizze.php"">Le Nostre Pizze</a></li>


        </ul>

 

        <!-- Funzione ricerca -->
        <ul class="nav navbar-nav navbar-right">
            <?php
                if($_GET['errore'] == 'ricercavuota') {
                    echo "<font color=crimson><b>Inserisci il nome della pizza</b></font><br>";
                }
            ?>
            <form action="user_ricerca.php" method="post" class="navbar-form navbar-right" role="search">
                <!-- Campo compilabile -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Cerca pizza" name ="pizzasearch">
                </div>
                <!-- Pulsante di ricerca -->
                <button type="submit" class="btn btn-default">Ricerca</button>
            </form>
        </ul>

    </div>

</nav>


<!-- In Evidenza -->
    
<br>
<br>       
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Giorno di consegna</th>
            <th>Ora di consegna</th> 
            <th>Indirizzo di consegna</th>
            <th>Visualizza pizze ordinate</th>
            <th>Cancella ordine</th>           
        </tr>
        <tr>
            <?php  
                $dbconn = db_connection();     
                $res=stampa_ordini_per_utente($dbconn);      
                foreach($res as $rec) {
                    echo"<tr>
                        <td>$rec[idordine]</td>
                        <td>$rec[login]</td>
                        <td>$rec[giornoconsegna]</td>
                        <td>$rec[oraconsegna]</td>
                        <td>$rec[indirizzoconsegna]</td>
                        <td><form action=user_visualizza_pizza_utente.php method='post'>
                        <input type='hidden' name='idordine' value='$rec[idordine]'>

                            <button class='form-control btn btn-primary' name='vedi_pizze' style='text-align:center;'>Visualizza pizze ordinate</button>
                            
                            </form>
                        </td>
                        <td><a href='user_cancella_ordini.php?ido=$rec[idordine]'>
                            <button class='form-control btn btn-primary' name='vedi_pizze' style='text-align:center;'>Cancella ordine</button>
                        </td>
                    </tr>";           
                }
            ?>                             
        </tr>
    </table>
    </div>

<br>
<br>
<!-- Footer -->
<div class="container">
    <footer>
        <hr class="featurette-divider">
        <p class="pull-right"><a href="user_lista_ordini.php">Torna su</a></p>

        <p>© 2016, Basi Di Dati, Pizzeria Online</p>

    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<br>

</body>
</html>
