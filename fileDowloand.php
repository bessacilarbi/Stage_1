<?php
include 'database.php';

header('Content-type: application/vnd-ms-excel');
$filename="user_data.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf8_encode">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Export</title>
    <style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
    <div class="row">
        <div class="column">
            <table>
                <tr>
                        <!-- Affichage des noms de colonne -->
                    <th style="border:2px solid black;">INDICE</th>
                    <th style="border:2px solid black;">DATE_APPEL</th>
                    <th style="border:2px solid black;">NUM_TEL</th>
                </tr>
                <?php
                        // Recuperer la date de debut et Date de fin
                    $start = $_POST["DateDébut"];
                    $end = $_POST["DateFin"];
                        // Enlever les tirets de la Date de début
                    $DEBUT = $start;
                    $DEBUT = str_replace("-","",$DEBUT);
                        // Enlever les tirets de la Date de Fin
                    $FIN = $end;
                    $FIN = str_replace("-","",$FIN);
                        // <!-- REQUETE 1 -->
                    $RequeteN1="........";
            
                        // exécute une requête
                    $ResultatN1=sqlsrv_query($connect,$RequeteN1);
            
                        // Retourne de données sous la forme d'un tableau
                    while($TableauN1 = sqlsrv_fetch_array($ResultatN1))
                    {
                ?>
                            <tr>
                                    <!-- Afficher les données récupérer dans la database  -->
                                <td style="border:2px solid black;"><?php echo $TableauN1['INDICE']; ?></td>  
                                <td style="border:2px solid black;"><?php echo $TableauN1['DATE_APPEL']; ?></td>  
                                <td style="border:2px solid black;"><?php echo $TableauN1['NUM_TEL']; ?></td>  
                            </tr>
                            <?php
                    }
                    ?>
            </table>
        </div>
        <div class="column">
            <table>
                <tr>
                    <th style="border:2px solid black;">NUM_TEL</th>
                    <th style="border:2px solid black;">NOMBRE_FOIS</th>
                </tr>
                <?php
                        // <!-- REQUETE 2 -->
                    $RequeteN2="........";
                                    
                        // exécute une requête
                    $ResultatN2=sqlsrv_query($connect,$RequeteN2);

                        // Retourne de données sous la forme d'un tableau
                    while($TableauN2 = sqlsrv_fetch_array($ResultatN2))
                    {
                ?>
                            <tr>
                                    <!-- Afficher les données récupérer dans la database  -->
                                    <td style="border:2px solid black;"><?php echo $TableauN2['NUM_TEL']; ?></td>  
                                    <td style="border:2px solid black;"><?php echo $TableauN2['NOMBRE_FOIS']; ?></td>  
                            </tr>
                            <?php
                    }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>
