
<?php

    require "partials/functions.php";
    logged_only();    
    // $month = $_SESSION['months'];
    $id = $_SESSION["id"];
    $connect = new PDO("mysql:host=localhost;dbname=agitel", "root", "");

    if($_POST["gethour"] != '' and ctype_digit($_POST["gethour"])){
        $search_text = $_POST["gethour"]; // conversion en donnée numérique
        echo $search_text;
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
                    echo $search_text;            
                    echo "<div class='alert alert-success'>Donnée enregistré avec succès</div>";                    
                }    
            }
            else{
                $query = "UPDATE justifier SET hour = ? WHERE  months = ? and student_id= ?";
                $statement = $connect->prepare($query);
                $result = $statement->execute([$search_text, $months, $id]);
                if($result){
                    echo "<div class='alert alert-success'>Mis à jour effectuée avec succès</div>";
                }
            }        
        // var_dump($result_justifier);        
        
        }else{
            echo "<div class='alert alert-danger'>Nombre invalide lisez l'indication ci-dessus</div>";
        }
            
                
    }else{
        echo "<div class='alert alert-danger'>Nombre entier requis</div>";
    }
      

?>

<script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="js/script.js"></script>