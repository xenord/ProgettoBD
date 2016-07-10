
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
    <title>Risultati ricerca</title>
</head>

<body>

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
            <li><a href="admin.php"">Console Amministrazione</a></li>
            <!-- Catalogo pizze -->
            <li><a href="admin_pizze.php"">Le Nostre Pizze</a></li>


        </ul>

 

        <!-- Funzione ricerca -->
        <ul class="nav navbar-nav navbar-right">
            <?php
                if($_GET['errore'] == 'ricercavuota') {
                    echo "<font color=crimson><b>Inserisci il nome della pizza</b></font><br>";
                }
            ?>
            <form action="admin_ricerca.php" method="post" class="navbar-form navbar-right" role="search">
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
                <br>

                <div class="container">
                        <?php
                            require "../functions.php";
                                try {
                                    $dbconn=db_connection();
                                    echo $_GET['pizzasearch'];
                                    $prova=cerca_pizze($dbconn, $_POST['pizzasearch']);
                                    if($prova>0 ){
                                        $ciao= 0;
                                        foreach ($prova as $provo ) {
                                            $ciao = $ciao +1;
                                        }
                                        if($ciao){
                                            $dbconn=db_connection();
                                            echo $_GET['pizzasearch'];
                                            $ris=cerca_pizze($dbconn, $_POST['pizzasearch']);
                                            echo "<table class='table table-bordered'>
                                                    <thead>
                                                        <tr>
                                                            <th>Nome pizza: </th>
                                                            <th>Ingredienti: </th>
                                                            <th>Prezzo: </th>
                                                        </tr>
                                                    </thead>";
                                            foreach($ris as $rec) {
                                                echo "<tbody>
                                                    <tr>
                                                        <td>$rec[nome] </td>
                                                        <td>$rec[ingredienti] </td>
                                                        <td>$rec[prezzo] €</td>
                                                    </tr>
                                                </tbody>";
                                            }
                                        }
                                        else echo "<h1 style='text-align:center;'>La/e pizza/e da te cercate non sono state trovate.</h1>";
                                    }
                                    else {
                                        echo "<h1 style='text-align:center;''>Non è stato inserito niente da cercare.</h1>";
                                        echo "<h1 style='text-align:center;''>Riprova.</h1>";
                                    }
        
                                }catch (PDOException $e) { echo $e->getMessage(); }
                        ?>
                    </table>
                </div>

        <!--    </tr>
        </table> -->

    
    </body>
</html>
