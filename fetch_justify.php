<?php
//fetch.php
require "partials/functions.php";
logged_only();
// $result_justifier["compt"];
$id = $_SESSION['id'];

$connect = new PDO("mysql:host=localhost;dbname=agitel", "root", "");
// $output = '';
// $mois  = array('', "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
// unset($_SESSION['input_status']);
if($_POST["query"] != '')
{
  
  $search_array = explode(",", $_POST["query"]);  
  $search_text = "'" . implode("', '", $search_array) . "'";
  $_SESSION['months'] = $_POST["query"];
  $months = $_SESSION["months"];
  // echo $months;
  // verification des données
  $query_justifier = "SELECT COUNT(id) as comp, hour FROM justifier WHERE months ='$months' AND student_id = '$id' GROUP BY id";
  $statement_justifier = $connect->query($query_justifier);
  // echo " id : " . $id;
  // echo " months : " . $search_text;
  
  $result_justifier = $statement_justifier->fetch();
  // var_dump($result_justifier);
  // $_SESSION["input_status"]["comp"] = $result_justifier["comp"];
  // $_SESSION["input_status"]["hour"] = $result_justifier["hour"];
  // var_dump($_SESSION["input_status"]["comp"]);
  

//   $query = "
//   SELECT marquer.months, marquer.HOUR AS heure FROM marquer WHERE marquer.student_id = '$id' AND marquer.months = $search_text";  
//     echo $query;
 $query = "SELECT marquer.months, SUM(marquer.HOUR) AS heure
            from marquer LEFT JOIN etudiant
            ON marquer.student_id = etudiant.CODE 
            WHERE marquer.HOUR IS NOT NULL AND 
            etudiant.CODE = '$id' AND marquer.months = $search_text GROUP BY months";          
}

else
{
    // $current_month = $mois[date('n')];

    // $pre_query = "SELECT marquer.months from marquer WHERE marquer.hour IS NOT NULL";
    // $statement = $connect->query($pre_query);
    // $my_month_result = $statement->fetch();
    // $_POST["query"] = $search_text = $my_month_result["months"];
    // $search_text = $my_month_result["months"];
    // echo $my_month_result["months"];
    $query = "SELECT marquer.months, marquer.HOUR AS heure FROM marquer WHERE marquer.student_id = '$id'";  
}


// $current_month = $mois[date('n')];
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetch();
$_SESSION["hour"] = $result["heure"];
// $total_row = $result->rowCount();

$output = '';

if($result && empty($result_justifier))
{

    $heure = $result["heure"];?>
    <div class="alert alert-info animated bounceIn">Heure max à justifier :<strong> <?= $heure ?></strong></div>
        
<?php
}
else if($result && !empty($result_justifier)){?>
  <div class="alert alert-warning animated bounceIn">* Heure déja justifiée Pour ce mois <br> * En cas de saisie <strong>la donnée</strong>  sera <strong>mis à jour</strong></div><?php
}

else
{?> 
  <div class="alert alert-danger">Aucun mois encore referencé </div> 
 <?php 
}


// if($_POST["q"] != ''){
//     $q = ctype_digit($_POST["q"]);
//     if($q OR ($q > $heure && $q < 0)){
//         $_SESSION["flash"]["data"] = "Entrée nom valide";
//     }
//     else{
//         $sql = "INSERT INTO justifier(hour, months, student_id) VALUES(?, ?, ?, ?)";
//         $statement = $connect->prepare($sql);
//         $statement->execute([$_POST["q"], $search_text, $id]);
//         $_SESSION["flash"]["data"] = "Donnée Inserée avec success ! ";
//     }
// }


?>

<script src="js/jquery-3.3.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="js/script.js"></script>