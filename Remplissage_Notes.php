<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remplissage notes</title>
</head>
<body>

<form action="./analyseForm.php" method="POST">
    <table>
        <thead>
            <tr>
                <th colspan="6">Saisie des notes CCF </th>

            </tr>
        </thead>
    <tbody>
    <label for="epreuve_ccf">Choisissez votre épreuve</label><br>
    <?php
        if(isset($_POST['soumettre'])){

            extract($_POST);

            $s_bts = $_POST['section'];

            foreach($s_bts as $ind => $sec){
                global $section;
                $section = $sec;
            }

            include './ConnexionMySQL.php';
            global $db;

            $requete_sql = "SELECT cf.CLEF_CCF, cf.CODE_CCF, cf.LIBELLE_CCF
            FROM ccf cf
            INNER JOIN filiere_bts f
            ON f.ID_BTS = cf.fk_id_bts
            WHERE f.CODE_BTS = :code_bts";

            $q = $db->prepare($requete_sql);

            $q->bindParam(':code_bts', $section);

            $q->execute();

            $donnees = $q->fetchAll();

            echo "<select name='epreuve_ccf[]' id='epreuve_ccf' >";
            foreach($donnees as $ligne){
                echo "<option value='".$ligne['CLEF_CCF']."'>".$ligne['CODE_CCF']." : ".$ligne['LIBELLE_CCF']."</option><BR>";
            }
            echo "</select>";
        }
    ?>
    <br>
    <label for="coefficient">Choisissez votre coefficient</label><br>
    <input type='number' name='coefficient' min='0' max='50'><br>
    <label for="duree_epreuve">Choisissez la durée de l'épreuve</label><br>
    <input type='time' name='duree_epreuve' value='01:00:00' step='1'><br>
    <label for="heure_convocation">Choisissez l'heure de convocation</label><br>
    <input type='time' name='heure_convocation' value='08:00:00' step= '1'>
    
        <tr>
            <td>Code filière</td>
            <td>Numero Eleve</td>
            <td>Nom Eleve</td>
            <td>Date</td>
            <td>Note</td>
            <td>Commentaire</td>
        </tr>
        <tr>
            <?php
                if(isset($_POST['soumettre'])){

                    /*extract($_POST);

                    $s_bts = $_POST['section'];
                    */
                    /*foreach($s_bts as $ind => $sec){
                        global $section;
                        $section = $sec;
                    }*/

                    $requete_sql = 
                    "SELECT DISTINCT f.ID_BTS, c.CLEF_ELEVE, c.NUMERO_ELEVE, c.NOM_CANDIDAT 
                    FROM candidat c
                    INNER JOIN filiere_bts f
                    ON c.fk_id_bts = f.id_bts
                    WHERE f.CODE_BTS = :code_bts";

                    $q = $db->prepare($requete_sql);

                    $q->bindParam(':code_bts', $section);
                    
                    $q->execute();

                    $donnees = $q->fetchAll();
                    #var_dump($donnees);
                    foreach($donnees as $ligne){
                        #var_dump($ligne);
                        echo "<tr>";
                        echo "<td>".$section."</td>";
                        echo "<td>".$ligne['NUMERO_ELEVE']."</td>";
                        echo "<td>".$ligne['NOM_CANDIDAT']."</td>";
                        echo "<td><input type='date' name='dateEpreuve[]' value='2023-04-15' min='2023-03-01' max='2023-06-30'</td>";
                        echo "<td><input type='number' name='noteEpreuve[]' min='0' max='20'</td>";
                        echo "<td><input type='text' name='commentaire[]' </td>";
                        echo "<td><input type='hidden' name='idEleve[]' value='".$ligne['CLEF_ELEVE']. "'></td>";
                        echo "<td><input type='hidden' name='idBts[]' value='".$ligne['ID_BTS']. "'></td><br>";
                    }
                }
            ?>
    <br>
    <input type='submit' name='soumettre_final' value='Envoyer les notes' />
    </tbody>
    </table>
</form>
</body>
</html>
