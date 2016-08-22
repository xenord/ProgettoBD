<html>
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
        <link rel="stylesheet" href="../css/admin_pages.css">
        <!-- Titolo -->
        <title>Pizze ordinate</title>
    </head>

    <body>
        <?php
            require "../functions.php";
            verifica_accesso();
            echo "Hai selezionato l'ordine dell'utente: ".$_GET['usr'];
        ?>



        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <th>Nome pizza</th>
                    <th>Numero pizze ordinate</th>
                </tr>

                <?php
                    try {
                        if(isset($_POST['vedi_pizze'])) {  
                            $dbconn = db_connection();     
                            $stat = $dbconn->prepare('select p.nome, pc.numeropizze from ordini o, pizzecontenute pc, pizze p where pc.idordine = o.idordine and p.idpizza = pc.idpizza and o.login = ?');
                            $stat->execute(array($_GET['usr']));
                            $res = $stat->fetch();
                            foreach($res as $rec) {
                                echo "<tr>
                                    <td>$rec[nome]</td>
                                    <td>$rec[numeropizze]</td>
                                </tr>";
                            }
                        }
                    } catch (PDOException $e) { echo $e->getMessage(); }
                ?> 
            </table>
        </div>

        <br>
        <br>
        <!-- Footer -->
        <div class="container">
            <footer>
                <hr class="featurette-divider">
                <p class="pull-right"><a href="admin_lista_ordini.php">Torna su</a></p>

                <p>© 2016, Basi Di Dati, Pizzeria Online</p>

            </footer>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <br>

    </body>
</html>