<?php

    if(isset($_POST['soumettre'])){
        
        extract($_POST);

        $id_numen = $_POST['id_numen'];
        $nom_prof = $_POST['nom_prof'];
        $prenom_prof = $_POST['prenom_prof'];
        $adresse_mail = $_POST['adresse_mail'];
        $mot_de_passe = sha1($_POST['mot_de_passe']);

        if(!empty($id_numen) && !empty($nom_prof) && !empty($prenom_prof) && !empty($adresse_mail) && !empty($mot_de_passe)){


            include "./ConnexionMySQL.php";
            global $db;

            $c = $db->prepare("SELECT ADRESSE_MAIL FROM professeurs WHERE ADRESSE_MAIL = ?");
            $c->execute([$adresse_mail]);
            $result = $c->rowCount();


            if($result == 0){
                $q = $db->prepare("INSERT INTO professeurs(ID_NUMEN, NOM_PROF, PRENOM_PROF, ADRESSE_MAIL, MOT_DE_PASSE) VALUES(?, ?, ?, ?, ?)");
                $q->bindParam($id_numen, $nom_prof, $prenom_prof, $adresse_mail, $mot_de_passe);
                $q->execute([$id_numen, $nom_prof, $prenom_prof, $adresse_mail, $mot_de_passe]);  
                echo '<script>alert("Le compte a été créée")</script>';
            }
            else{
                echo '<script>alert("Un compte avec cette adresse mail existe déjà.")</script>';
            }
            
        }
        
        else{
            echo '<script>alert("Les champs sont vides")</script>';
        }
    

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'enregistrer : Epreuves CCF</title>
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper">
        <a href="https://www.enc-bessieres.org/"><img src="./logo_enc.png"></a>
    <h1>S'enregistrer</h1>
    <form method="POST" action="register.php">
        ID Numen :
        <input name="id_numen" id="id_numen" type="text" placeholder="ex: ABC123ABDTRDA">
        <br>
        Nom :
        <input name="nom_prof" id="nom_prof" type="text" placeholder="ex: ROBERT">
        <br>
        Prénom :
        <input name="prenom_prof" id="prenom_prof" type="text" placeholder="ex: Timothée">
        <br>
        Mail : 
        <input name="adresse_mail" id="adresse_mail" type="text" placeholder="exemple@enc-bessieres.org">
        <br>
        Mot de passe :
        <input name="mot_de_passe" id="mot_de_passe" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        <br>
        <input type="submit" id="soumettre" name="soumettre" value="S'enregistrer" />
    </form>
    Vous avez un compte? Retournez vers la <a href="index.php">page de connexion</a>
    </div>
</body>
</html>

