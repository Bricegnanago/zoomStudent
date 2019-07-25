<?php
//fetch.php
$connect = new PDO("mysql:host=localhost;dbname=agitel", "root", "");
$output = '';
 
$mois  = array('', "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
if($_POST["query"] != '' && isset($_POST["filiere"]))
{
  $filiere = (!empty($_SESSION['fil'])) ? $_SESSION["fil"] : $_POST["filiere"];
  $search_array = explode(",", $_POST["query"]);  
  $search_text = "'" . implode("', '", $search_array) . "'";  
  
  $query = "
  SELECT etudiant.nom, etudiant.prenom, SUM(marquer.hour) AS
  'heure_total', (select hour from justifier where justifier.student_id = etudiant.code and months IN (".$search_text.")) as 'Heure_just'  
  FROM marquer LEFT JOIN etudiant
  ON marquer.student_id = etudiant.code
  WHERE  marquer.months IN (".$search_text.") AND classe='$filiere'
  GROUP BY marquer.student_id";

  // $query_justify = "SELECT hour from justifier LEFT JOIN etudiant 
  // ON justifier.student_id = etudiant.CODE WHERE etudiant.CODE = 1 
  // AND justifier.months IN (".$search_text.") 
  // ";
}
else
{
  $_POST['filiere'] = 'lp3info';
  $filiere = (!empty($_SESSION['fil'])) ? '$_SESSION["fil"]' : $_POST['filiere'];
    $current_month = $mois[date('n')];
    $query = "
    SELECT etudiant.nom, etudiant.prenom, SUM(marquer.hour) AS
    'heure_total', (select hour from justifier where justifier.student_id = etudiant.code and months = ?) as 'Heure_just' 
    FROM marquer LEFT JOIN etudiant
    ON marquer.student_id = etudiant.code 
    WHERE  marquer.months = ? and classe='$filiere'
    GROUP BY marquer.student_id";
    // echo $query;
    // $query = "select * from etudiant";
}
$current_month = $mois[date('n')];
$statement = $connect->prepare($query);

$statement->execute(array($current_month, $current_month));

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{  
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td class="animated slideInLeft">'.$row["nom"].'</td>
   <td class="animated slideInLeft">'.$row["prenom"].'</td>
   <td class="text-primary text-center animated slideInLeft">'.$row["heure_total"]. '</td>
   <td class="text-success text-center animated slideInLeft">'. $row["Heure_just"] = (!empty($row["Heure_just"]) ? $row["Heure_just"] : 0) .'</td>
   <td class="text-info text-center animated slideInLeft">'. (intval($row["heure_total"]) - intval($row["Heure_just"])).'</td>
  </tr>
  ';
  // Si la variable d'heure est vide alors elle prends la valeur 0
 }
}
else
{
 $output .= "
 <tr>
  <td colspan='5' align='center'>No Data Found </td>
 </tr>
 ";

//  echo "<p>" . $current_month = date('M')."</p>";
}

echo $output;


?>

