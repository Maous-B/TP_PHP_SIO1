<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epreuves CCF : Saisie de notes</title>
    <!--<link href="./style.css" rel="stylesheet" type="text/css">-->
</head>


<body>
    <form action="Remplissage_Notes.php" method="POST">
        <div class="wrapper">
            <table>
                
                <tbody>
                <!--onchange="this.form.submit()";-->
                <label for="section">Choisissez votre formation</label><br>
                <select name="section[]" id="section" >
                    <option value=""></option>
                    <option value="SIO">Services Informatiques aux Organisations</option>
                    <option value="CI">Commerce International</option>
                    <option value="COM">Communication</option>
                    <option value="CG">Comptabilité et Gestion</option>
                    <option value="NDRC">Négociation Digitalisation de la Relation Client</option>
                    <option value="PI">Professions immobilières</option>
                    <option value="SAM">Support à l'Action Managériale</option>
                    <option value="TOU">Tourismea</option>
                </select>
                <br>

                <input type="submit" name="soumettre" value="Envoyer" />
                </tbody>
            </table>
        </div>
    </form>
</body>
</html>
