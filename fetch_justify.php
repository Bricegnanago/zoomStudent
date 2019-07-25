<?php
//fetch.php
require "partials/functions.php";
logged_only();
$id = $_SESSION['id'];

$connect = new PDO("mysql:host=localhost;dbname=agitel", "root", "");
if($_POST["query"] != '')
{
  
  $search_array = explode(",", $_POST["query"]);  
  $search_text = "'" . implode("', '", $search_array) . "'";
  $_SESSION['months'] = $_POST["query"];
  $months = $_SESSION["months"];
  // verification des données
  $query_justifier = "SELECT COUNT(id) as comp, hour FROM justifier WHERE months ='$months' AND student_id = '$id' GROUP BY id";
  $statement_justifier = $connect->query($query_justifier);
  // echo " id : " . $id;
  // echo " months : " . $search_text;
  
  $result_justifier = $statement_justifier->fetch();
 $query = "SELECT marquer.months, SUM(marquer.HOUR) AS heure
            from marquer LEFT JOIN etudiant
            ON marquer.student_id = etudiant.CODE 
            WHERE marquer.HOUR IS NOT NULL AND 
            etudiant.CODE = '$id' AND marquer.months = $search_text GROUP BY months order by marquer.months";
}

else
{
    
    $query = "SELECT marquer.months, marquer.HOUR AS heure FROM marquer WHERE marquer.student_id = '$id'";  
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetch();
$_SESSION["hour"] = $result["heure"];
// $total_row = $result->rowCount();

$output = '';

if($result && empty($result_justifier))
{
    echo "Aucune justification";
    $heure = $result["heure"];?>
    <div class="alert alert-info animated bounceIn" id="flash">Heure max à justifier :<strong> <?= $heure ?></strong></div>
        
<?php
}
else if($result && !empty($result_justifier)){?>
  <div class="alert alert-warning animated bounceIn" id="flash">La donnée</strong> sera <strong>mis à jour</strong></div><?php
}

else
{?> 
  <div class="alert alert-danger" id="flash">Aucun mois encore referencé </div> 
 <?php 
}
?>