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
    <title>Ricarica magazzino</title>
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
            <li><a href="admin.php"">Console Amministrazione</a></li>
            <li><a href="admin_pizze.php"">Le Nostre Pizze</a></li>


        </ul>

 

        <!-- Funzione ricerca -->
        <ul class="nav navbar-nav navbar-right">
            <?php
                if($_GET['errore'] == 'ricercavuota') {
                    echo "<font color=crimson><b>Inserisci il nome della pizza</b></font><br>";
                }
            ?>
            <form action="admin.ricerca.php" method="post" class="navbar-form navbar-right" role="search">
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
    <?php
        try {
            $dbconn = db_connection();
            echo $_GET['pizzasearch'];
            $ris=ingredientti_disponibili($dbconn);
            echo "<table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>ID ingrediente </th>
                            <th>Nome ingrediente</th>
                            <th>Quantità </th>
                        </tr>
                    </thead>";
            foreach($ris as $rec) {
                echo "<tbody>
                    <tr>
                        <td>$rec[idingrediente] </td>
                        <td>$rec[nomeingrediente] </td>
                        <td>$rec[quantita]</td>
                    </tr>
                </tbody>";
            }
        } catch (PDOException $e) { echo $e->getMessage(); }
    ?>
    </table>
</div>

<br>
<br>
<hr class="featurette-divider">
<br>
<br>         

<section id="ricarica_ingrediente" class="ricarica_ingrediente">  
    <div class="container" style="width: 500px";>          
        <form action="admin_ricarica_magazzino_fun.php" method="post">
                <tr>
                    <td>
                        <label for="delete">Seleziona un'ingrediente da ricaricare:</label>
                        <select class="form-control" name="nomeingrediente" id="delete">
                        <?php                  
                            $dbconn = db_connection(); 
                            $res=ingredientti_disponibili($dbconn); 
                            foreach($res as $rec) {   
                                echo"<option value='$rec[nomeingrediente]'>$rec[nomeingrediente]</option>";
                            }
                        ?>
                        </select>      
                    </td>
                </tr>
                <label>Quantità da aggiungere</label>
                <br>
                <input type="int" name="quantita">  
        <button class="form-control btn btn-primary" type="submit" value="Ricarica Ingrediente">Ricarica Ingrediente</button>
        </form>
    </div>
<section>
    <?php        
        if($_GET['msg']=='ricaricaavvenuta') {
            echo "<font color=darkgreen face=arial><b>Ricarica avvenuta con successo</b></font><br>";
        }     
    ?>  
<br>
<br>
<!-- Footer -->
<div class="container">
    <footer>
        <hr class="featurette-divider">
        <p class="pull-right"><a href="admin_ricarica_magazzino.php">Torna su</a></p>

        <p>© 2016, Basi Di Dati, Pizzeria Online</p>

    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<br>
</body>

</html>