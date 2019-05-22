<!-- traitemant -->
<?php
    require 'partials/functions.php';
    require 'db.php';
    logged_only();

     if(!empty($_GET['code'])) 
     {
        $id = checkInput($_GET['code']);

        $code = $id ;

     }
    // $code = $id ;
    $db = Database::connect();
    //  on recupère toutes les occurences de l'id pintni_rv"g
    $statement = $db->prepare("SELECT * FROM etudiant WHERE code = ?");
    $statement->execute(array($code));
    $student = $statement->fetch();

    $sql = "SELECT marquer.hour AS heure from marquer LEFT JOIN etudiant ON marquer.student_id = etudiant.code WHERE 
    marquer.months = ? AND marquer.week = ? AND marquer.student_id = ?";
    $statement_hour = $db->prepare($sql);
    $statement_hour->execute([$_SESSION["month"], $_SESSION["week"], $id]);
    $student_hour = $statement_hour->fetch();
    $heure = $student_hour['heure'];
    Database::disconnect();

    
    if($heure == "" && !isset($heure)){
        $heure = "0";
    }

    
    //update de la base de donnée
    if(isset($_POST["update"])){
        

        if(!empty($_POST["want_hour"])){
            $want_hour = checkInput($_POST["want_hour"]);
            if($student_hour){
                echo "Je vais faire un update ";
                $query = 
                "UPDATE marquer INNER JOIN etudiant 
                ON marquer.student_id = etudiant.code
                SET marquer.hour = ?
                WHERE marquer.months = ? AND 
                marquer.week = ? AND etudiant.code = ?";
                $db = Database::connect();
                $insert = $db->prepare($query);
                $checkInsert = $insert->execute([$want_hour, $_SESSION["month"], $_SESSION["week"], $id]);
                $_SESSION["flash"]["info"] = "Mise à jour effectuée avec success !";
                header("Location: liste.php");
                exit;
            }else{
                echo "Je vais faire une insertion";
                $query_insert = 
                "INSERT INTO marquer(student_id, months,hour, week) 
                 VALUES(?, ?, ?, ?)";
                 $statement_query_insert = $db->prepare($query_insert);
                 $check_statement_query_insert = $statement_query_insert->execute(array($id,  $_SESSION["month"],$want_hour, $_SESSION["week"]));
                 $_SESSION["flash"]["info"] = "Donnée inserée avec success !";

                 header("Location: liste.php");
                 exit;
            }           
            
            Database::disconnect();
        }else{
            $error_hour = "Nombre entier requis !";
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,400|Oxygen|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/app.css">

	<title>Coming Soon</title>
</head>
<body>
	<div class="page">
        <img src="images/logo_AGITEL.png" alt="" class="animated bounce infinite logo mt-3" alt="Transparent MDB Logo" id="animated-img1 " style=" width: 200px; float: left"><a href="logout.php" class="float-right mr-5 logout text-white"><i class="fas fa-lock fa-3x"></i></a>
        <div class="container" style="">

        <div class="searchbar mb-3 mt-3">
					<div class="searchbar-query">
                        <div class="searchbar-input-wrapper br-right">
                            <i class="fas fa-search"></i> 
                            <div class="searchbar-input">
                                <input class="searchbar-input searchbar-query-input searchbar-query-input-opened valid" placeholder="Quel(le) classe, Institut…">
                            </div>
                        </div>
					</div>
					<div class="searchbar-query">
						<div class="searchbar-input-wrapper">
                            <i class="fas fa-user-graduate"></i>
							<div class="searchbar-input">
								<input class="searchbar-input searchbar-place-input" placeholder="Quel étudiant?">
							</div>
							<button class="dl-button btn-icon Tappable-inactive searchbar-place-around-me-button  dl-button-size-normal"
								role="button" type="button">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="searchbar-place-around-me-icon">
                                    <path d="M0 0h24v24H0z" fill="none"></path><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3c-.46-4.17-3.77-7.48-7.94-7.94V1h-2v2.06C6.83 3.52 3.52 6.83 3.06 11H1v2h2.06c.46 4.17 3.77 7.48 7.94 7.94V23h2v-2.06c4.17-.46 7.48-3.77 7.94-7.94H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z">

                                    </path>
                                </svg><i class="icon-dm-delete-form searchbar-place-around-me-clear"></i>
                            </button>
						</div>
					</div>
					<button class="br-btn Tappable-inactive dl-button-primary searchbar-submit-button dl-button dl-button-size-normal" 
						role="button" type="submit">
						<span class="dl-button-label">
							<span class="searchbar-submit-button-label">Rechercher</span>     
							<i class="fas fa-chevron-right"></i>
						</span>
					</button>
        </div>
                               
                <div class="clearfix"></div>   <!-- Editable table -->
               
            <div class="row">                         
                <div class="wrappers">
                    <?php if(isset($check_statement_query_insert) || isset($checkInsert)):?>
                        <div class="round mx-auto mb-3"><i class="fas fa-check-double fa-7x mx-auto text-success animated bounceIn infinite" style="display: block; position: absolute; top: 50%; left : 50%; transform: translate(-50%, -50%);"></i></div> 
                    <?php endif ;?>                   
                    <div class="card" style="box-shadow : 0 4px 8px  0; background-color: #050f0e!important">
                        <h5 class="card-header h5 text-white bg-success text-center">Mise à jour heure / Mois</h5>
                        <div class="card-body text-white">
                            <?php if(isset($error_hour)) :?>

                                <div class="alert alert-danger">
                                    <?= $error_hour ; ?>
                                </div>         
                            <?php endif; ?>
                            <form action="" class="m-auto text-center" method="POST">
                                <div class="form-group mx-auto">
                                    <?= $student["nom"] . " " . $student["prenom"];?>
                                </div>
                                <div class="form-group mx-auto">
                                    <?= $_SESSION["month"] . " - " . $_SESSION["week"];?>
                                </div>
                                <div class="form-group mx-auto" >
                                    <div class="badge"><?= $heure ?></div>
                                </div>
                                <div class="form-group mx-auto">
                                    <input type="text" name="want_hour" value="" style="box-shadow : 0 4px 8px 0; width: 30%; border-radius: 5px!important; " placeholder="ici">
                                </div>
                                <button class="btn bg-success text-white" type="submit" name="update" style="width: 200px!important; height: 60px!important; font-size: 1.2rem;">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                    
    


        </div>

    </div>
   

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>