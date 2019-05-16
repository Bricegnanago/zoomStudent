<?php
//fetch.php
$connect = new PDO('mysql:host=localhost;dbname=agitel', "root", "");
$hourArray = array();
if(isset($_POST["query_week"], $_POST["query_month"]))
{
  

  $search_month = trim(htmlspecialchars(stripcslashes($_POST["query_month"])));
  $search_week = trim(htmlspecialchars(stripcslashes($_POST["query_week"])));
 


  $query = "SELECT * FROM etudiant";
  $sql = "SELECT marquer.hour AS heure, etudiant.nom, marquer.student_id from marquer LEFT JOIN etudiant ON marquer.student_id = etudiant.CODE  WHERE 
    marquer.months = ? AND marquer.WEEK = ? ORDER BY etudiant.nom";
    // $hourArray = array();    
    // $result = $connect->query($query);
    
      // $rem = [];
    
    $result = $connect->query($query);
    $boolian = false;
    while($row = $result->fetchObject()){
      $heure = "0";
      
      $result_hour = $connect->prepare($sql);
      $result_hour->execute(array($search_month, $search_week)); 
      if(!$result_hour->rowCount()){
        $boolian_fetch = true;
      }
      while($rowss = $result_hour->fetchObject()){
        $boolian = true;
        if($rowss->student_id == $row->code){
          $heure = $rowss->heure;
          
        }
        else{

          if($heure == "0" OR $heure == 0){
            $heure = 0;
          }
        }
      }
      
      ?>
          <tr>
          <td><?= $row->code  ?></td>
            <td><?= $row->nom ?></td>
            <td><?= $row->prenom ?></td>    
            <td><?php
              if($boolian){?>
                <input disabled  name="heure[]" type="text" value="<?= $heure ?>" style="box-shadow : 0 8px 4px 0 rgba(0,0,0, .1)!important">
                <?php
              }else{?>              
                <input type="text" name="heure[]" value="<?= $heure ?>" style="box-shadow : 0 8px 4px 0 rgba(0,0,0, .3)!important"> <?php
              }
              
              ?>
                
            </td>
            <td><a  href="student.view.php?id=<?= $row->code ?>" class="btn btn-danger btn-lg"><i class="fa fa-eye" aria-hidden="true" ></i> Voir</a></td>
    
          </tr>
          <?php
        }
}
else
{
 echo 'Data Not Found';
}

?>