<?php
//fetch.php
$connect = new PDO("mysql:host=localhost;dbname=agitel", "root", "");
$output = '';
$mois  = array('', "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
if($_POST["query"] != '')
{
  $search_array = explode(",", $_POST["query"]);  
  $search_text = "'" . implode("', '", $search_array) . "'";  
  
  $query = "
  SELECT etudiant.nom, etudiant.prenom, SUM(marquer.hour) AS
  'heure_total' 
  FROM marquer LEFT JOIN etudiant
  ON marquer.student_id = etudiant.code
  WHERE  marquer.months IN (".$search_text.")
  GROUP BY marquer.student_id";  
}
else
{
    $current_month = $mois[date('n')];
    
    $query = "
    SELECT etudiant.nom, etudiant.prenom, SUM(marquer.hour) AS
    'heure_total' 
    FROM marquer LEFT JOIN etudiant
    ON marquer.student_id = etudiant.code
    WHERE  marquer.months = '$current_month'
    GROUP BY marquer.student_id";
    echo $query;
    // $query = "select * from etudiant";
}
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
    
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["nom"].'</td>
   <td>'.$row["prenom"].'</td>
   <td>'.$row["heure_total"].'</td>   
  </tr>
  ';
 }
}
else
{
 $output .= "
 <tr>
  <td colspan='5' align='center'>No Data Found </td>
 </tr>
 ";

 echo "<p>" . $current_month = date('M')."</p>";
}

echo $output;


?>

