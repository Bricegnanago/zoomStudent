<!-- traitemant -->
<?php
    require 'partials/functions.php';
    require 'db.php';
     

     if(!empty($_GET['id'])) 
     {
        $id = checkInput($_GET['id']);
     }
    $db = Database::connect();
    //  on recupère toutes les occurence de l'id pintni_rv"g
    $statement = $db->prepare("SELECT * FROM  etudiant");
    $statement->execute(array($id));
    $student = $statement->fetch();
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
				<section id="filiere">
                    
                    <div class="card p-5">
                        
                        <div class="row">
                            <div class="col-lg-12 mb-5" >
                                <div class="text-left h5 text-success" style="float: left;">Informatique - Licence 3</div>
                                <div class="text-right h5 text-success"  style="float: right;">Année-universitaire</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-5">
                                <div class="card">
                                    <h5 class="card-header h5 text-success">Tableau de bord</h5>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><?= $student["nom"] . " " . $student["prenom"]; ?></li>
                                            <li class="list-group-item">Née le <?= $student["date_naissance"]; ?> A Bouaké</li>
                                            <li class="list-group-item">Sexe : M</li>
                                            <li class="list-group-item">N° Carte Etudiant : 10001838</li>                                                
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card" style="box-shadow : 0 4px 8px  0">
                                    <h5 class="card-header h5 text-white" style="background-color: #3FDBAB">Bilan Général</h5>
                                    <div class="card-body">
                                            <table class="table table-default table-hover text-center">
                                                <thead>
                                                    <tr>                        
                                                    <th>Mois</th>
                                                    <th>Nombre d'heures</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>                                                                                                            
                                                        <td>Du 14 Jan au 14 Fev</td>
                                                        <td><span class="badge badge-danger ml-2">3</span></td>
                                                    </tr>                                                
                                                    <tr>                                                        
                                                        <td>Du 14 Fev au 14 Avr </td>
                                                        <td ><span class="badge badge-danger ml-2">3</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="total  col-lg-12 p-2 mx-auto my-2 bg-success text-center text-white rounded "><span class="red h1">24H</span></div>
                                            <a href="#" class="btn btn-danger">Convoquer</a> 

                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
					<!-- Grid row -->

	  <!-- Grid row -->
				</section>

			</div>

	</div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>