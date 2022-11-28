<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epreuves CCF : Saisie de notes</title>
    <link href="./style.css" rel="stylesheet" type="text/css">

</head>
<body>
    <FORM ACTION="" METHOD="POST">
        <div class="wrapper">
        <form method="POST" action="" id="mon_formulaire"></form>
            <table>
                <thead>
                    <tr>
                        <th colspan="6"> Saisie des notes CCF</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Code Fillière</td>
                        <td>Numéro Eleve</td>
                        <td>Nom Eleve</td>
                        <td>Code épreuve</td>
                        <td>Date</td>
                        <td>Note</td>
                    </tr>
                    <tr>
                        <td><input name="code_filiere" placeholder="Code filière"></td>
                        <td><input name="numero_eleve" placeholder="Numéro élève"></td>
                        <td><input name="nom_eleve" placeholder="Nom candidat"></td>
                        <td><input name="prenom_eleve" placeholder="Prénom candidat"></td>
                        <td><input name="code_epreuve" placeholder="Code épreuve"></td>
                        <td><input name="date_epreuve" placeholder="Date"></td>
                    </tr>
                </tbody>
                <input type="button" class="add" value="Ajouter une ligne">
                <br>
                <input type="button" class="add" value="Supprimer une ligne">
            </table>
            
        </div>
</body>
</html>