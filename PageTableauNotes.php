
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

                <select name="formation" id="formation">
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
                    <tr>
                        <td>Code Fillière</td>
                        <td>Numéro Eleve</td>
                        <td>Nom Eleve</td>
                        <td>Code épreuve</td>
                        <td>Date</td>
                        <td>Note</td>
                    </tr>
                    <tr>
                        <!--<td><select name="formations[]" id="formation-select">
                            <option value="">Code filière</option>
                            <option value="SIO">Services Informatiques aux Organisations (SIO)</option>
                            <option value="CI">Commerce International (CI)</option>
                            <option value="COM">Communication (COM)</option>
                            <option value="CG">Comptabilité et Gestion (CG)</option>
                            <option value="NDRC">Négociation Digitalisation de la Relation Client (NDRC)</option>
                            <option value="PI">Professions immobilières (PI)</option>
                            <option value="SAM">Support à l'Action Managériale (SAM)</option>
                            <option value="TOU">Tourisme (TOU)</option>
                        </select></td>
                        <td><input name="numero_eleve" placeholder="Numéro élève"></td>
                        <td><input name="nom_eleve" placeholder="Nom candidat"></td>
                        <td><input name="prenom_eleve" placeholder="Prénom candidat"></td>
                        <td><input name="code_epreuve" placeholder="Code épreuve"></td>
                        <td><input name="date_epreuve" placeholder="Date"></td>
                        <td><input type="submit" id="soumettre" name="soumettre" value="Envoyer les notes"></td>
                        -->
                    </tr>
                </tbody>
            </table>
            
        </div>
</body>
</html>