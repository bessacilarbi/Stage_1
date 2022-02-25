<?php
include 'database.php';

header('Content-type: application/vnd-ms-excel');
$filename="user_data.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
?>
<table class="table table-bordered" type="inline-block">
    <thead>
        <tr>
                <!-- Affichage des noms de colonne -->
            <th style="border:2px solid black;">INDICE</th>
            <th style="border:2px solid black;">DATE_APPEL</th>
            <th style="border:2px solid black;">NUM_TEL</th>
        </tr>
    </thead>
    <tbody>
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
            $RequeteN1="....";
			
                // exécute une requête
            $ResultatN1=sqlsrv_query($connect,$RequeteN1);
			
                // Retourne de données sous la forme d'un tableau
            while($TableauN1=sqlsrv_fetch_array($ResultatN1))
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
    </tbody>
</table>

<table class="table table-bordered" type="inline-block">
    <thead>
        <tr>
                <!-- Affichage des noms de colonne -->
            <th style="border:2px solid black;">NUM_TEL</th>
            <th style="border:2px solid black;">NOMBRE_FOIS</th>
        </tr>
    </thead>
    <tbody>
                <!-- REQUETE 2 -->
        <?php
            $RequeteN2="....";
            $ResultatN2=sqlsrv_query($connect,$RequeteN2);
            while($TableauN2=sqlsrv_fetch_array($ResultatN2))
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
    </tbody>
</table>