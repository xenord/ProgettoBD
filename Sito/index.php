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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/personal.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Titolo -->
    <title>Homepage</title>
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
        <a class="navbar-brand" href="index.php">Homepage</a>
    </div>


    <!-- MENU DI NAVIGAZIONE-->
    <div class="navbar-collapse collapse ">
        <ul class="nav navbar-nav">

            <!-- Catalogo pizze -->
            <li><a href="pizze.php">Le Nostre Pizze</a></li>

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Registrazione<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#login">Login</a></li>
                    <li><a href="#registrazione">Registrazione</a></li>
                </ul>
            </li>

            <!-- Modulo Registrazione -->
            <?php
            /*
                require "functions.php";

                if($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $loginErr = $nomeErr = $cognomeErr = $indirizzoErr = $passwordErr = "";
                    $login = $nome = $cognome = $indirizzo = $password =  "";
                    $telefonoErr = 0;
                    $telefono = 0;

                    if (empty($_POST["login"])) {
                        $loginErr = "Username mancante!";
                    }  
                    if (empty($_POST["nome"])) {
                        $nomeErr = "Nome mancante!";
                    }  
                    if (empty($_POST["cognome"])) {
                        $cognomeErr = "Cognome mancante!";
                    }
                    if (empty($_POST["indirizzo"])) {
                        $indirizzoErr = "Indirizzo mancante!";
                    }
                    if (empty($_POST["password"])) {
                        $passwordErr = "Password mancante!";
                    }
                    if (empty($_POST["telefono"])) {
                        $telefonoErr = "N° telefono mancante!";
                    }
                    else {
                    try{  
                        $dbconn = db_connection();
                        $statement = $dbconn->prepare('select count (*) from utenti where login = ?');
                        $statement->execute(array($_POST['login']));
                        $rec = $statement->fetch();
                        if ($rec[0] == 1) {               
                            header('Location:registrazione.php?errore=utenteesistente');
                        }
                        else{
                            session_start();
                            $_SESSION['login'] = $_POST['login'];

                            inserisci_utente($dbconn);
                            echo "<font color=darkgreen face=arial><b>Registrazione effettuata</b></font><br>";
                        }
                    } catch (PDOException $e) { echo $e->getMessage(); }
                }
                }
                else {
                    $error = "Questo non dovrebbe succedere!";
                }
                */
            ?>

        </ul>

 


        </ul>

        <!-- Funzione ricerca -->
        <ul class="nav navbar-nav navbar-right">
            <?php
                if($_GET['errore'] == 'ricercavuota') {
                    echo "<font color=crimson><b>Inserisci il nome della pizza</b></font><br>";
                }
            ?>
            <form action="ricerca.php" method="post" class="navbar-form navbar-right" role="search">
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
    
    <!-- modulo login -->
<br>
<br>
<h1 style="text-align:center;">Accedi per ordinare!</h1>
<br>
<br>
<h3>Sei nuovo? <a href="#registrazione">Registrati subito!</a></h3>
<br>
<br>
<section id="login" class="login"> 
    <div class="container">
        <h4 class="modal-title" id="Login">Accedi</h4>
        <div class="modal-body">
            <form role="form" action="accesso.php" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="uLogin" placeholder="Login" name="login">
                            <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" id="uPassword" placeholder="Password" name="password">
                        <label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
                    </div>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Ricordami
                    </label>
                </div>
                <a data-toggle="modal" data-target="#registrazione">Non sei ancora Registrato?</a>
            </div>
            <div class="modal-footer">
                <button type="Submit" value="Accedi" class="form-control btn btn-primary">Accedi</button>
            </div>
            </form>
        </div>
    </div>
</div>
</section>

<br>
<br>
<br>
<br>
<hr class="featurette-divider">
<br>
<br>
<br>
<br>

    <!-- modulo registrazione -->
<section id="registrazione" class="registrazione">
    <div class="container">
        <h4 class="modal-title">Registrazione</h4>
        <div class="modal-body">
            <form role="form" action="registrazione.php" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="rUsername" placeholder="Username" name="login"> 
                        <label for="uPassword" class="input-group-addon glyphicon glyphicon-user"></label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="rNome" placeholder="Nome" name="nome">
                        <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="rCognome" placeholder="Cognome" name="cognome">
                        <label for="uPassword" class="input-group-addon glyphicon glyphicon-user"></label>
                    </div>
                </div>


                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="rIndirizzo" placeholder="Indirizzo" name="indirizzo">
                        <label class="input-group-addon glyphicon glyphicon-bookmark"></label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" id="rPassword" placeholder="Password" name ="password">
                        <label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="rTelefono" placeholder="N° telefono" name="telefono">
                        <label for="uLogin" class="input-group-addon glyphicon glyphicon-phone"></label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="form-control btn btn-primary" value="Registrazione" >Registrazione</button>
                </div>
                        <?php
                            if ($_GET['errore'] == 'campivuoti') { 
                                echo "<font color=crimson><b>Non hai inserito tutti i dati!!!</b></font><br>";
                            }

                            elseif ($_GET['errore'] == 'erroretelefono') { 
                                echo "<font color=crimson><b>Il numero di telefono deve contenere cifre comprese tra 0 e 9</b></font><br>";
                            }

                            elseif($_GET['errore'] == 'utenteesistente') {
                                echo "<font color=crimson><b>Utente già registrato</b></font><br>";
                            }
                        ?>

            </form>
        </div>
    </div>
</section>
<br>
<br>
<br>
<br>



<!-- Tag Sociali + gerarchia -->
<div class="container hidden-print">
    <div class="row">
    <hr class="featurette-divider">
        <!-- gerarchia -->
    <div class="col-lg-6 col-md-6 col-sm-12 ">        
        <p><a class="btn btn-lg btn-default gerarchia-btn" href="#" role="button">Gerarchia del sito</a></p>
        </div>
        <!-- TAG SOCIALI -->
    <div class="col-lg-6 col-md-6 hidden-xs hidden-sm hidden-print tag-sociali">
        <!-- Inseriamo un nuovo div di classe panel panel-default -->
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h3 class="panel-title">Tag Sociali</h3>
            </div>
            <div class="panel-body">
                <h2><a href="index.php">Pizzeria</a></h2>

                <h4><a href="pizze.php">Margherita</a></h4>

                <h2><a href="ordini.php">Ordina Adesso!</a></h2>
            </div>
        </div>
    </div>
</div>
</div>
    

<!-- Footer -->
<div class="container">
    <footer>
        <hr class="featurette-divider">
        <p class="pull-right"><a href="index.php">Torna su</a></p>

        <p>© 2016, Basi Di Dati, Pizzeria Online <a href="contacts.html">Contatti</a></p>

    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<br>
</body>

</html>