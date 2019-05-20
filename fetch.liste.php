<?php
//fetch.php
session_start();
$connect = new PDO('mysql:host=localhost;dbname=agitel', "root", "");
$hourArray = array();
if(isset($_POST["query_week"], $_POST["query_month"]))
{
  
  
  $search_month = trim(htmlspecialchars(stripcslashes($_POST["query_month"])));
  $search_week = trim(htmlspecialchars(stripcslashes($_POST["query_week"])));
  $_SESSION["month"] = $search_month;
  $_SESSION["week"] = $search_week;

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
            <td class="animated zoomInDown"><?= $row->code  ?></td>
            <td class="animated zoomInDown"><?= $row->nom ?></td>
            <td class="animated zoomInDown"><?= $row->prenom ?></td>    
            <td class="animated zoomInDown"><?php
              if($boolian){?>
                <input disabled  name="heure[]" type="text" value="<?= $heure ?>" style="box-shadow : 0 8px 4px 0 rgba(0,0,0, .1)!important; width: 50px!important; height: 50px; border-radius : 50%!important;" class="animated zoomInDown m-auto">
                <?php
              }else{?>              
                <input type="text" name="heure[]" value="<?= $heure ?>" style="box-shadow : 0 8px 4px 0 rgba(0,0,0, .3)!important;  width: 70px!important; border-radius : 5px!important;     background-color: #ffffff;
    color: #080000;" class="animated zoomInDown"> <?php
              }
              
              ?>
                
            </td>
            <td class="text-center"><?php
              if($boolian){?>
                <a disabled  name="modif" href="update_hour.php?id=<?= $row->code ?>" class="btn btn-primary btn-lg animated zoomInDown" style="box-shadow : 0 4px 8px 0 rgba(0,0,0, .3)!important"><i class="fas fa-pen-alt"></i></a>
                <?php
              }else{
                echo "-";
              }
              
              ?>
                
            </td>
            <td class="text-center"><a  href="student.view.php?id=<?= $row->code ?>" class="btn btn-danger btn-lg animated zoomInDown"><i class="fa fa-eye" aria-hidden="true" ></i></a></td>
    
          </tr>
          <?php
        }
}
else
{
 echo 'Data Not Found';
}

?>