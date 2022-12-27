<?php
    if(isset($_POST['soumettre_final'])){

        extract($_POST);

        include './ConnexionMySQL.php';
        global $db;
        //var_dump($_POST);
        $index = 0;
        $id_notes = array_combine($_POST['idEleve'], $_POST['noteEpreuve']);
        $commentaires = $_POST['commentaire'];
        foreach($id_notes as $id => $notes){
            echo $id." est l'id de l'élève et la note est de ".$notes."<br>";
            $REQUETE_SQL_FINAL_ENVOI_NOTES = "INSERT INTO 
            epreuve_ccf(DATE_EPREUVE, HEURE_CONVOCATION, DUREE_EPREUVE, NOTE_OBTENU, COEFFICIENT, COMMENTAIRE_EVALUATION, fk_clef_eleve, fk_id_ccf, fk_id_bts) 
            VALUES(:date_e, :heure_conv, :duree_e, :note_o, :coef, :com_eval, :fk_c_e, :fk_i_c, :fk_i_b);";
            $q_final = $db->prepare($REQUETE_SQL_FINAL_ENVOI_NOTES);
            $q_final->bindParam(':date_e', $_POST['dateEpreuve'][0], PDO::PARAM_STR);
            $q_final->bindParam(':heure_conv', $_POST['heure_convocation'], PDO::PARAM_STR);
            $q_final->bindParam(':duree_e', $_POST['duree_epreuve'], PDO::PARAM_STR);
            $q_final->bindParam(':note_o', $notes, PDO::PARAM_STR);
            $q_final->bindParam(':coef', $_POST['coefficient'], PDO::PARAM_INT);
            $q_final->bindParam(':com_eval', $commentaires[$index], PDO::PARAM_STR);
            $q_final->bindParam(':fk_c_e', $id, PDO::PARAM_INT);
            $q_final->bindParam(':fk_i_c', $_POST['epreuve_ccf'][0], PDO::PARAM_INT);
            $q_final->bindParam(':fk_i_b', $_POST['idBts'][0], PDO::PARAM_INT);
            $q_final->execute();
            $index++;
        }


        
    }


?>