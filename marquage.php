<?php
    session_start();
    require "partials/functions.php";
    if( isset($_POST['submit'])){
        // debug($_POST['heure'][3]);
        debug($_POST['month']);
        echo "month :" ;
        var_dump($_POST['month']);
        echo "week :" ;
        var_dump($_POST['week']);
        debug($_POST['week']);
        $month = $_POST['month'];
        $week = $_POST['week'];
        
        // debug(" tout les code etudiants " . $_SESSION['student']['code']);
        require 'db.php';
                                        
        $db = Database::connect();
        // $statement = $db->query("SELECT etudiant.prenom, etudiant.nom, marquer.week, marquer.hour, marquer.date_naissance FROM etudiant INNER JOIN marquer WHERE etudiant.code = marquer.student_id");
        $statement = $db->query("SELECT etudiant.code, prenom, nom, marquer.months, marquer.week, marquer.HOUR, etudiant.date_naissance FROM etudiant INNER JOIN marquer WHERE etudiant.code = marquer.student_id AND marquer.months='$month' AND marquer.WEEK='$week'");
        // var_dump($statement);
        $i = 0;
        $etat = $statement->rowCount();
        if($etat > 0){
            $_SESSION["flash"]["warning"] = "Saisie deja faite";
            header('Location: liste.php');
            exit;
                        
        }else{
            $i = 0;
            $sql = "SELECT *from etudiant";
            $statement = $db->query($sql);
            /*$i !== count($_POST['heure'])*/
            while($row = $statement->fetch()) {
                    $req = $db->prepare("INSERT INTO marquer SET months= ?, week= ?, student_id = ?, hour = ?, save_At= NOW()");
                    if(!empty($_POST['heure'][$i]) && $_POST['heure'][$i] !== "0"){
                        $req->execute([$month, $week, $row["code"], $_POST['heure'][$i]]);
                    }    

                    $i++;
                
            }

            $_SESSION["flash"]["info"] = "Données insérées avec succès";
            header('Location: liste.php');
            exit;
        }
        
        Database::disconnect();
        

       
       
    }

?>