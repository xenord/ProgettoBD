<!DOCTYPE html> 
<html>
    <head>
        <title> Progetto Basi Di Dati </title>
        <meta http- equiv="content-type" content="text/html" charset="UTF-8" lang="it-IT">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>

    
    <body>
    
        <h1 style="text-align:center;font-family:arial;"> Under construction (Cerca pizze)</h1>
        
        <a href="index.php"><Button style="text-align:center;font-family:arial;">Ritorna alla pagina principale</button></a>
            
            <!-- <table border=1 style='width:100%;text-align:center;font-family:arial;font-size:18px;border-collapse: collapse;'>
             <tr>
                <th>Nome:</th>
                <th>Prezzo:</th>            
            </tr>
             <tr>   --> 
    
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nome pizza: </th>
                            <th>Ingredienti: </th>
                            <th>Prezzo: </th>
                        </tr>
                        </thead>
                        <?php
                            require "functions.php";
                                try {
                                    $dbconn=db_connection();
                                    echo $_GET['pizzasearch'];
                                    $ris=cerca_pizze($dbconn, $_POST['pizzasearch']);
                                        if($ris>0){
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
                                        else {
                                            header('Location:index.php?errore=ricercavuota');
                                        }
        
                                }catch (PDOException $e) { echo $e->getMessage(); }
                        ?>
                    </table>
                </div>

        <!--    </tr>
        </table> -->

    
    </body>
</html>
