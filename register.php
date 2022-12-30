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
        <input name="id_numen" id="id_numen" type="text" placeholder="ID NUMEN" size="30">
        <br>
        <input name="nom_prof" id="nom_prof" type="text" placeholder="Nom" size="30">
        <br>
        <input name="prenom_prof" id="prenom_prof" type="text" placeholder="Prénom" size="30">
        <br>
        <input name="adresse_mail" id="adresse_mail" type="text" placeholder="Adresse mail" size="30">
        <br>
        <input name="num_telephone" id="num_telephone" type="text" placeholder="N° Tel" size="30">
        <br>
        <input name="mot_de_passe" id="mot_de_passe" type="password" placeholder="Mot de passe" size="30">
        <br>
        <input name="c_mot_de_passe" id="c_mot_de_passe" type="password" placeholder="Confirmation du mot de passe" size="30">
        <br>
        <select name="section[]" id="section">
            <option value="">Choisissez votre formation</option>
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
        <input type="submit" id="soumettre" name="soumettre" value="S'enregistrer">
    </form>
    Vous avez un compte? Retournez vers la <a href="login.php">page de connexion</a>
    </div>
</body>
</html>

<?php

    include "./ConnexionMySQL.php";
    global $db;

    if(isset($_POST['soumettre'])){
        
        extract($_POST);

        $id_numen = $_POST['id_numen'];
        $nom_prof = $_POST['nom_prof'];
        $prenom_prof = $_POST['prenom_prof'];
        $adresse_mail = $_POST['adresse_mail'];
        $num_telephone = $_POST['num_telephone'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $c_mot_de_passe = $_POST['c_mot_de_passe'];
        $sec = $_POST['section'];

        foreach($sec as $ind => $s){
            global $section;
            $section = $s;
        }

        $requete = "SELECT f.ID_BTS
        FROM filiere_bts f
        WHERE f.CODE_BTS = :id_bts";
        $q_id_bts = $db->prepare($requete);
        $q_id_bts->bindParam(':id_bts', $section);
        $q_id_bts->execute();

        global $donnees;
        $donnees = $q_id_bts->fetchAll();

        
        if(!empty($id_numen) && !empty($nom_prof) && !empty($prenom_prof) && !empty($adresse_mail) && !empty($num_telephone) && !empty($mot_de_passe) && !empty($c_mot_de_passe)){

            if($mot_de_passe == $c_mot_de_passe){
                

                $c = $db->prepare("SELECT ADRESSE_MAIL FROM professeurs WHERE ADRESSE_MAIL = ?");
                $c->execute([$adresse_mail]);
                $result = $c->rowCount();
                $hashpass = password_hash($mot_de_passe, PASSWORD_ARGON2ID);


                if($result == 0){
                    foreach($donnees as $ligne){
                        global $id_bts;
                        $id_bts = $ligne;
                    }
                    $q = $db->prepare("INSERT INTO professeurs(ID_NUMEN, NOM_PROF, PRENOM_PROF, ADRESSE_MAIL, NUM_TELEPHONE, MOT_DE_PASSE, fk_id_bts) VALUES(?, ?, ?, ?, ?, ?, ?)");
                    //$q = $db->prepare("INSERT INTO professeurs(ID_NUMEN, NOM_PROF, PRENOM_PROF, ADRESSE_MAIL,NUM_TELEPHONE, MOT_DE_PASSE) VALUES(:id_numen, :nom_prof, :prenom_prof, :adresse_mail, :num_telephone, :mot)");
                    /* $q->bindParam(1,$id_numen,PDO::PARAM_STR);
                    $q->bindParam(2,$nom_prof,PDO::PARAM_STR);

                    $q->bindParam(3,$prenom_prof,PDO::PARAM_STR);

                    $q->bindParam(4,$adresse_mail,PDO::PARAM_STR);

                    $q->bindParam(5,$num_telephone,PDO::PARAM_STR);

                    $q->bindParam(6,$hashpass,PDO::PARAM_STR);
                    */
                    
                    $q->execute([$id_numen, $nom_prof, $prenom_prof, $adresse_mail, $num_telephone, $hashpass, $id_bts[0]]);  
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
