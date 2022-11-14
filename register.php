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