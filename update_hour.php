<!-- traitemant -->
<?php
    require 'partials/functions.php';
    require 'db.php';
    session_start();
    

     if(!empty($_GET['id'])) 
     {
        $id = checkInput($_GET['id']);
     }
    $db = Database::connect();
    //  on recupère toutes les occurences de l'id pintni_rv"g
    $statement = $db->prepare("SELECT * FROM  etudiant where code = ? ");
    $statement->execute(array($id));
    $student = $statement->fetch();

    $sql = "SELECT marquer.hour AS heure from marquer LEFT JOIN etudiant ON marquer.student_id = etudiant.CODE  WHERE 
    marquer.months = ? AND marquer.WEEK = ? AND etudiant.code = ?";
    $statement_hour = $db->prepare($sql);
    $statement_hour->execute([$_SESSION["month"], $_SESSION["week"], $id]);
    $student_hour = $statement_hour->fetch();
    $heure = $student_hour['heure'];
    Database::disconnect();

     


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,400|Oxygen|Roboto" rel="stylesheet">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/app.css">

	<title>Coming Soon</title>
</head>
<body>
	<div class="page">

		<div class="wrapper">
			<img src="images/logo_AGITEL.png" alt="" class="logo">
			<div class="container" style="">

				<!--<div class="searchbar" style="margin-top: 50px;">
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

								</path></svg><i class="icon-dm-delete-form searchbar-place-around-me-clear"></i></button>
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
								
-->
				
                    
                                        
                <div class="row">                         
                    <div class="wrappers">
                        <div class="card" style="box-shadow : 0 4px 8px  0; background-color: #050f0e!important">
                            <h5 class="card-header h5 text-white bg-success text-center">Mise à jour heure / Mois</h5>
                            <div class="card-body text-white">
                                <form action="" class="m-auto text-center" >
                                    <div class="form-group mx-auto">
                                        <?= $student["nom"] . " " . $student["prenom"];?>
                                    </div>
                                    <div class="form-group mx-auto">
                                        <?= $_SESSION["month"] . " " . $_SESSION["week"];?>
                                    </div>
                                    <div class="form-group mx-auto" >
                                        <div class="btn bg-success btn-lg"><?= $heure ?></div>
                                    </div>
                                    <div class="form-group mx-auto">
                                        <input type="text" name="want_hour" value="" style="box-shadow : 0 4px 8px 0; width: 60%; border-radius: 5px!important; " placeholder="Saisir l'heure ici ...">
                                    </div>
                                    <button class="btn bg-success" type="submit" name="update">Mise à jour</button>
                                </form>
                                    
                                    
                            </div>
                        </div>
                    </div>
                </div>
                      
        


			</div>

        </div>
    </div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>