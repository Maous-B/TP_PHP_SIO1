
<!DOCTYPE html>
<?php

    if(isset($_POST['soumettre'])){

        extract($_POST);

        $section_bts = $_POST['section'];

        #print_r($section_bts);

        foreach($section_bts as $indice => $section){

            include './ConnexionMySQL.php';
            global $db;
            $q = $db->prepare("SELECT f.CODE_BTS, c.NUMERO_ELEVE, c.NOM_CANDIDAT 
            FROM candidat c
            INNER JOIN filiere_bts f
            ON c.fk_id_bts = f.id_bts
            WHERE f.CODE_BTS = :code_bts");
            $q->bindParam(':code_bts', $section);
            $q->execute();
            $donnees = $q->fetch();
            
            $nom_candidat = $donnees['NOM_CANDIDAT'];
            $clef_eleve = $donnees['CLEF_ELEVE'];
            
            echo "<script type='text/javascript'>alert('$message');</script>";
            
        }


    }

?>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epreuves CCF : Saisie de notes</title>
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>


<body>
    <form action="PageTableauNotes.php" method="POST">
        <div class="wrapper">
            <table>
                <thead>
                    <tr>
                        <th colspan="6"> Saisie des notes CCF</th>
                    </tr>
                </thead>
                <tbody>

                <select name="section[]" id="formation">
                    <option value="">-- Choisissez votre formation --</option>
                    <option value="SIO">Services Informatiques aux Organisations</option>
                    <option value="CI">Commerce International</option>
                    <option value="COM">Communication</option>
                    <option value="CG">Comptabilité et Gestion</option>
                    <option value="NDRC">Négociation Digitalisation de la Relation Client</option>
                    <option value="PI">Professions immobilières</option>
                    <option value="SAM">Support à l'Action Managériale</option>
                    <option value="TOU">Tourisme</option>
                </select>

                <input type="submit" name="soumettre" value="Importer" />
                    <tr>
                        <td>Code filière</td>
                        <td>Numéro Eleve</td>
                        <td>Nom Eleve</td>
                        <td>Code Epreuve</td>
                        <td>Date</td>
                        <td>Note</td>
                    </tr>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>
</html>
