<?php

    if(isset($_POST['soumettre'])){
        
        extract($_POST);

        $id_numen = $_POST['id_numen'];
        $nom_prof = $_POST['nom_prof'];
        $prenom_prof = $_POST['prenom_prof'];
        $adresse_mail = $_POST['adresse_mail'];
        $num_telephone = $_POST['num_telephone'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $c_mot_de_passe = $_POST['c_mot_de_passe'];


        if(!empty($id_numen) && !empty($nom_prof) && !empty($prenom_prof) && !empty($adresse_mail) && !empty($num_telephone) && !empty($mot_de_passe) && !empty($c_mot_de_passe)){

            if($mot_de_passe == $c_mot_de_passe){
                include "./ConnexionMySQL.php";
                global $db;

                $c = $db->prepare("SELECT ADRESSE_MAIL FROM professeurs WHERE ADRESSE_MAIL = ?");
                $c->execute([$adresse_mail]);
                $result = $c->rowCount();


                $options = ['cost' => 12];
                $hashpass = password_hash($mot_de_passe, PASSWORD_BCRYPT, $options);


                if($result == 0){
                    $q = $db->prepare("INSERT INTO professeurs(ID_NUMEN, NOM_PROF, PRENOM_PROF, ADRESSE_MAIL, NUM_TELEPHONE, MOT_DE_PASSE) VALUES(?, ?, ?, ?, ?, ?)");
                    //$q = $db->prepare("INSERT INTO professeurs(ID_NUMEN, NOM_PROF, PRENOM_PROF, ADRESSE_MAIL,NUM_TELEPHONE, MOT_DE_PASSE) VALUES(:id_numen, :nom_prof, :prenom_prof, :adresse_mail, :num_telephone, :mot)");
                    /* $q->bindParam(1,$id_numen,PDO::PARAM_STR);
                    $q->bindParam(2,$nom_prof,PDO::PARAM_STR);

                    $q->bindParam(3,$prenom_prof,PDO::PARAM_STR);

                    $q->bindParam(4,$adresse_mail,PDO::PARAM_STR);

                    $q->bindParam(5,$num_telephone,PDO::PARAM_STR);

                    $q->bindParam(6,$hashpass,PDO::PARAM_STR);
                    */


                    //var_dump( $num_telephone);
                    
                    $q->execute([$id_numen, $nom_prof, $prenom_prof, $adresse_mail, $num_telephone, $hashpass]);  
                    $message = "Le compte a été créée avec succès.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                else{
                    $message = "Un compte avec cette adresse mail existe déjà.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }

            else
            {
                $message = "Les deux mots de passe sont incorrect.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            
        }
        
        else{
            $message = "Les champs sont vides.";
            echo "<script type='text/javascript'>alert('$message');</script>";
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
    <form method="POST" action="">
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
        N° Téléphone :
        <input name="num_telephone" id="num_telephone" type="text" placeholder="ex: 01 23 45 67 89">
        <br>
        Mot de passe :
        <input name="mot_de_passe" id="mot_de_passe" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        <br>
        Confirmation du mot de passe :
        <input name="c_mot_de_passe" id="c_mot_de_passe" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        <br>
        <input type="submit" id="soumettre" name="soumettre" value="S'enregistrer" />
    </form>
    Vous avez un compte? Retournez vers la <a href="index.php">page de connexion</a>
    </div>
</body>
</html>