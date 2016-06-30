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
    <!-- Titolo -->
    <title>Progetto Basi Di Dati</title>
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

                        <!-- Login -->
            <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
            <!-- Modulo Login -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Accedi</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" action="accesso.php" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="uLogin" placeholder="Login" name="login">
                                        <label for="uLogin"
                                               class="input-group-addon glyphicon glyphicon-user"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="uPassword"
                                               placeholder="Password" name="password">
                                        <label for="uPassword"
                                               class="input-group-addon glyphicon glyphicon-lock"></label>
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
                            <button class="form-control btn btn-primary">Accedi</button>
                        </div>
                            </form>
                    </div>
                </div>
            </div>

            <!-- Modulo Registrazione -->
            <div class="modal fade" id="registrazione" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Registrazione</h4>
                        </div>

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
                                        <label for="uPassword"
                                               class="input-group-addon glyphicon glyphicon-user"></label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="rIndirizzo" placeholder="Indirizzo" name="indirizzo">
                                        <label class="input-group-addon glyphicon glyphicon-user"></label>
                            		</div>
                        		</div>

                        		<div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="rPassword"
                                               placeholder="Password" name ="password">
                                        <label for="uPassword"
                                               class="input-group-addon glyphicon glyphicon-lock"></label>
                                    </div>
                                </div>

                        		<div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="rTelefono" placeholder="N° telefono" name="telefono">
                                        <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
                            		</div>
                        		</div>
                        	<div class="modal-footer">
                        		<?php
                        			if ($_GET['errore'] == 'campivuoti') { 
      									echo "<font color=crimson face=arial><b>Non hai inserito tutti i dati!</b></font><br>";
									}
								?>
							</div>
                            <div class="modal-footer">
                            <button type="submit" class="form-control btn btn-primary">Registrazione</button>
                        	</div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </ul>

 


        </ul>

        <!-- Funzione ricerca -->
        <ul class="nav navbar-nav navbar-right">
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
    
<br>
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
        <p class="pull-right"><a href="homepage.html">Top</a></p>

        <p>© 2016, Basi Di Dati, Pizzeria Online <a href="contacts.html">Contatti</a></p>

    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<br>
</body>

</html>