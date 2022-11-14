<?php
    if(isset($_POST['soumettre'])){
        
        extract($_POST);

        $adresse_mail = $_POST['adresse_mail'];
        $mot_de_passe = sha1($_POST['mot_de_passe']);

        if(!empty($adresse_mail) && !empty($mot_de_passe)){


            include "./ConnexionMySQL.php";
            global $db;

            $c = $db->prepare("SELECT MOT_DE_PASSE FROM professeurs WHERE MOT_DE_PASSE = ?");
            $c->execute([$mot_de_passe]);
            $result = $c->rowCount();


            if($result != 0){
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
    <title>Connexion : Epreuves CCF</title>
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="wrapper">
        <a href="https://www.enc-bessieres.org/"><img src="./logo_enc.png"></a>
    <h1>Connexion</h1>
    <form action="" method="POST">
        Adresse mail :
        <input name="adresse_mail" type="text" placeholder="exemple@enc-bessieres.org">
        <br>
        Mot de passe :
        <input name="mot_de_passe" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        <br>
        <input type="submit" name="soumettre" value="Se connecter" />
    </form>
    Vous n'avez pas de comptes? Veuillez vous enregistrer <a href="register.php">ici</a>
    </div>
</body>
</html>