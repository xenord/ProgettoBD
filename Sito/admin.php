<body>
    
    <h1 style="text-align:center;font-family:arial;">Catalogo pizze</h1>
        
    <table border=1 style='width:100%;text-align:center;font-family:arial;font-size:18px;border-collapse: collapse;'>
             <tr>
                <th>Nome:</th>
                <th>Prezzo:</th>            
            </tr>
            <tr>
                <?php  
                    require "functions.php";
                         
                    $dbconn = db_connection();
                         
                    $res=lista_pizze($dbconn); 
                         
                    foreach($res as $rec)
                    {
                        echo"<tr><td>$rec[nome]<br>\nIngredienti:$rec[ingredienti]</td><td>$rec[prezzo] euro </td></tr>";
                        
                    }

                ?>                             
            </tr>
    </table> 

    <table>
        <tr>Nome:</tr><td><input type="text" name="nome"><</tr>
        <tr>Prezzo:</tr><td><input type="text" name="cognome"></tr>
        <tr>Lista Ingredienti:</tr><td><input type="text" name="lista_ingredienti"></tr>








    </table>  
</body>
