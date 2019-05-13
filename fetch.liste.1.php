<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "agitel");
$output = '';
if(isset($_POST["query_week"], $_POST["query_month"]))
{
  

 $search_month = mysqli_real_escape_string($connect, $_POST["query_month"]);
 $search_week = mysqli_real_escape_string($connect, $_POST["query_week"]);
 
 echo "Variable definie : " . $search_month . " " . $search_week;
//  $query = "
//   SELECT * FROM tbl_customer 
//   WHERE CustomerName LIKE '%".$search."%'
//   OR Address LIKE '%".$search."%' 
//   OR City LIKE '%".$search."%' 
//   OR PostalCode LIKE '%".$search."%' 
//   OR Country LIKE '%".$search."%'
//  ";
  $query = "
  SELECT etudiant.nom AS noms, etudiant.prenom, marquer.hour AS abs
  FROM etudiant LEFT JOIN marquer
  ON marquer.student_id = etudiant.code
  ";

  // echo " Query : " . $query;
}
else
{
    $query = "
    SELECT etudiant.nom AS noms, etudiant.prenom, marquer.hour as abs
    FROM etudiant LEFT JOIN marquer
    ON marquer.student_id = etudiant.code
    ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{?>
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Nom</th>
     <th>Prénom</th>
     <th> Heure abscence </th>
     
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= "
   <tr>
    <td>".$row['noms']."</td>
    <td>".$row['prenom']."</td>    
    <td> 
      <input type=text value="?>
      <?php if($row['abs']){ echo $row['abs'];}
      else{ echo $row['abs'] = ;} ?> </td> 

   </tr>
  ";
  <?php
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>