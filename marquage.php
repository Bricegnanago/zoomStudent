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
        $_SESSION['month'] = $month = $_POST['month'];
        $_SESSION['week'] = $week = $_POST['week'];
        $filiere = $_SESSION["fil"];
        // debug(" tout les code etudiants " . $_SESSION['student']['code']);
        require 'config/db.php';
                                        
        $db = Database::connect();
        // $statement = $db->query("SELECT etudiant.prenom, etudiant.nom, marquer.week, marquer.hour, marquer.date_naissance FROM etudiant INNER JOIN marquer WHERE etudiant.code = marquer.student_id");
        $statement = $db->query("SELECT marquer.id FROM etudiant INNER JOIN marquer ON etudiant.code = student_id AND months='$month' AND WEEK='$week' and classe='$filiere'");
        // SELECT marquer.id, marquer.months FROM marquer inner JOIN etudiant on marquer.student_id = etudiant.CODE WHERE classe='lp1info'
        // AND months = 'Octobre' AND WEEK='Semaine 2'
        $result = $statement->fetch();
        // echo "SELECT etudiant.code, prenom, nom, marquer.months, marquer.week, marquer.HOUR, etudiant.date_naissance FROM etudiant INNER JOIN marquer WHERE etudiant.code = marquer.student_id AND marquer.months='$month' AND marquer.WEEK='$week'";
        // var_dump($statement);
        $i = 0;
        $etat = $statement->rowCount();
        if($etat > 0){
            echo $_SESSION["flash"]["warning"] = "Saisie deja faite" . "<br>";
            echo "code etudiant : " . $result["code"] . "<br>";
            echo "code etudiant : " . $result["nom"] . "<br>";
            header('Location: liste.php');
            exit;
                        
        }else{
            $i = 0;
            $sql = "SELECT * from etudiant where classe='$filiere'";
            $statement = $db->query($sql);
            /*$i !== count($_POST['heure'])*/
            while($row = $statement->fetch()) {
                    $req = $db->prepare("INSERT INTO marquer SET months= ?, week= ?, student_id = ?, hour = ?, save_At= NOW()");
                    if( !ctype_digit($_POST['heure'][$i])){
                        $verify_hour = $_POST['heure'][$i];
                        $_SESSION["flash"]["data"] = "Entrée non prise en compte : '$verify_hour' n'est pas un entier" ;   
                        header('Location: liste.php');
                        exit;                     
                    }
                    else{
                        if($_POST['heure'][$i] != "0"){
                            $req->execute([$month, $week, $row["code"], $_POST['heure'][$i]]);
                            $_SESSION["flash"]["info"] = "Données insérées avec succès";
                        }
                    }

                    $i++;
                
            }
            header('Location: liste.php');
            exit;         
            
            
        }
        
        Database::disconnect();
        

       
       
    }

?>