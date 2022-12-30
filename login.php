

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
        
        <input name="adresse_mail" id="adresse_mail" type="text" placeholder="Adresse mail" size="30">
        <br>
        <input name="mot_de_passe" id="mot_de_passe" type="password" placeholder="Mot de passe" size="30">
        <br>
        <input type="submit" name="soumettre" value="Se connecter" />
    </form>
    Vous n'avez pas de comptes? Veuillez vous enregistrer <a href="register.php">ici</a>
    </div>
</body>
</html>

<?php
    session_start();
    if(isset($_POST['soumettre'])){
        
        extract($_POST);

        $adresse_mail = $_POST['adresse_mail'];
        $mot_de_passe = $_POST['mot_de_passe'];
        
        $_SESSION['add_mail'] = $adresse_mail;
        
        if(!empty($adresse_mail) && !empty($mot_de_passe)){
            
            include "./ConnexionMySQL.php";
            global $db;

            $q = $db->prepare("SELECT * FROM professeurs WHERE ADRESSE_MAIL = ?");
            $q->execute([$adresse_mail]);
            $result = $q->fetch();
            if(count($result)>0)
            {
                if(password_verify($mot_de_passe, $result['MOT_DE_PASSE']))
                {
                    $message = "Mot de passe correct. Redirection en cours...";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header('Location: accueil.php');
                    exit;
                }   
                else
                {
                    $message = "Mot de passe incorrect.";
                    echo "<script type='text/javascript'>alert('$message avec $mot_de_passe');</script>";
                }
            }
            else
            {
                $message = "Identifiant non trouvé dans la base de données.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }

        }
        
        else{
            $message = "Veuillez remplir l'ensemble des champs.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    

    }
?>
