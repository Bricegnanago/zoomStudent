<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Convert Data from Mysql to JSON Format using PHP</title>  
      </head>  
      <body>  
           <?php              
           $connect = new PDO('mysql:host=localhost;dbname=agitel', "root", "");
           $sql = "SELECT * FROM etudiant";  
           $result = $connect->query($sql);

           $json_array = array();  
           while($row = $result->fetch())
           {  
                $json_array[] = $row;  
           }  
           /*echo '<pre>';  
           print_r(json_encode($json_array));  
           echo '</pre>';*/  
           echo json_encode($json_array);  
           ?>  
      </body>  
 </html>  