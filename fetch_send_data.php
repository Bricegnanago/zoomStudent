
<?php

    require "partials/functions.php";
    logged_only();    
    // $month = $_SESSION['months'];
    $id = $_SESSION["id"];
    $connect = new PDO("mysql:host=localhost;dbname=agitel", "root", "");

    if($_POST["gethour"] != '' and ctype_digit($_POST["gethour"])){
        $search_text = $_POST["gethour"]; // conversion en donnée numérique
        // echo $search_text;
        if($search_text <= $_SESSION["hour"] && $search_text > 0){
            $months = $_SESSION["months"];
            // verification des données / voir si une heure n'a pas encore déja été saisie à ce mois
            $query_justifier = "SELECT COUNT(id) as comp, hour FROM justifier WHERE months ='$months' AND student_id = '$id' GROUP BY id";
            $statement_justifier = $connect->query($query_justifier);
            $result_justifier = $statement_justifier->fetch();
            if(empty($result_justifier)){//si c'est le cas
                $query = "INSERT INTO justifier(hour, months, student_id) values(?, ?, ?)";
                $statement = $connect->prepare($query);
                $result = $statement->execute([$search_text, $months, $id]);
                if($result){        
                    // echo $search_text;
                    echo "<div class='alert alert-success animated bounceIn' id='flashM'>Donnée enregistré avec succès au mois '$months'</div>";
                }    
            }
            else{
                $query = "UPDATE justifier SET hour = ? WHERE  months = ? and student_id= ?";
                $statement = $connect->prepare($query);
                $result = $statement->execute([$search_text, $months, $id]);
                if($result){
                    echo "<div class='alert alert-success animated bounceIn' id='flashM'>Mis à jour effectuée avec succès au mois de '$months'</div>";
                }
            }        
        // var_dump($result_justifier);        
        
        }else{
            echo "<div class='alert alert-danger animated bounceIn'>Nombre invalide lisez l'indication ci-dessus</div>";
        }
            
                
    }else{
        echo "<div class='alert alert-danger animated bounceIn'>Nombre entier requis</div>";
    }
      

?>